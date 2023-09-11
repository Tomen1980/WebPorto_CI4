<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'auth';
    // protected $useTimestamps = true;

    protected $allowedFields = ['email', 'username', 'password'];

public function getAuth($username = null){
    if($username == null){
            return $this->findAll();
        }
         return $this->where(['username' => $username])->first();
    }
public function getById($id){
         return $this->where(['id' => $id])->first();
    }

    public function getEmail(){
        $query = $this->builder()->select("email,profile.name")->join("profile","auth.id = profile.id_profile")->get();
        return $query->getResultArray();
    }
}
