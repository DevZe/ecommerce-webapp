<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

    protected $allowedFields = ['firstname', 'lastname', 'email', 'password','created_date','updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    public function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }


    public function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
        return $data;
    }
}