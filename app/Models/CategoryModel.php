<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'kategori';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kategori'];

public function getCategory($id = null){
    if($id == null){
            return $this->findAll();
        }
         return $this->where(['id' => $id])->first();
    }
}
