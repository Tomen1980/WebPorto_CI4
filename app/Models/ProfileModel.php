<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    // protected $useTimestamps = true;

    protected $allowedFields = ['id_profile','name', 'deskripsi','deskripsi_singkat', 'img_profile','passion','bod','website','phone','city','age','degree','freelance'];

    public function getById($id){
            return $this->where(['id_profile' => $id])->first();
        }
}
