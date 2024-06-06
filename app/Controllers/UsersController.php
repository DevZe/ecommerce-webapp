<?php

namespace App\Controllers;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'POST'){
            //Validate the the form
            $rules = [
                'email' =>'required|min_length[6]|max_length[50]|valid_email',
                'password' =>'required|min_length[6]|max_length[255]|validateUser[email,password]', 
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                //Store user in the database
                $model = new UsersModel();

                $user = $model->where('email',$this->request->getVar('email'))->first();
                $this->setUserSession($user);
                // $session->setFlashdata('success','Successfully Signed Up');
                 return redirect()->to('store');
            }
        }
        

        return view('auth/login',$data);
    }
 
    private function setUserSession($user)
    {
        $data = [

            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }
    public function register()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'POST'){
            //Validate the the form
            $rules = [
                'firstname' =>'required|min_length[3]|max_length[50]',
                'lastname' =>'required|min_length[3]|max_length[50]',
                'email' =>'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' =>'required|min_length[6]|max_length[255]',
                'password_confirm' =>'matches[password]'
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                //Store user in the database
                $model = new UsersModel();
                $newUser = [
                    'firstname'=>$this->request->getVar('firstname'),
                    'lastname'=>$this->request->getVar('lastname'),
                    'email'=>$this->request->getVar('email'),
                    'password'=>$this->request->getVar('password'),
                ];

                $model->save($newUser);
                $session = session();
                $session->setFlashdata('success','Successfully Signed Up');
                return redirect()->to('/auth/login');
            }
        }

        return view('auth/register',$data);
    }

    public function profile()
    {
        $data = [];
        helper(['form']);
        $model = new UsersModel();
        
        if($this->request->getMethod() == 'POST'){
            //Validate the the form
            $rules = [
                'firstname' =>'required|min_length[3]|max_length[50]',
                'lastname' =>'required|min_length[3]|max_length[50]',            
            ];

            if($this->request->getPost('password') != ''){
                
                $rules['password'] = 'required|min_length[6]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                //Store user in the database
               
                $newUser = [
                    'id' => session()->get('id'),
                    'firstname'=>$this->request->getPost('firstname'),
                    'lastname'=>$this->request->getPost('lastname'),                    
                ];

                if($this->request->getPost('password') != ''){

                    $newUser['password'] = $this->request->getPost('password');
                }
                $model->save($newUser);
                
                session()->setFlashdata('success','Successfully Updated');
                return redirect()->to('/profile');
            }
        }

        $data['user'] = $model->where('id',session()->get('id'))->first();

        return view('auth/profile',$data);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');

    }
}
