<?php 

namespace App\Validation;
use App\Models\UsersModel;

class UserRules
{
    public function validateUser(string $str,string $field,array $data)
    {
        $model = new UsersModel();
        $user = $model->where('email', $data['email'])->first();

        if (!$user) 
        {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}