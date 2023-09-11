<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table = 'portofolio';
    // protected $useTimestamps = true;

    protected $allowedFields = ['judul', 'deskripsi', 'id_kategori', 'client', 'date', 'url', 'img_porto'];

    public function getPorto($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getPagination($perPage, $keyword = null)
    {
        if ($keyword ) {
            $query = $this->builder()
                ->select("portofolio.id as portId,deskripsi,judul,client,date,url,img_porto, kategori.kategori")
                ->join("kategori", "kategori.id = portofolio.id_kategori")
                ->like("judul", $keyword)
                ->orLike("deskripsi", $keyword)
                ->orLike("client", $keyword)
                ->orLike("date", $keyword)
                ->orLike("kategori.kategori", $keyword);
            // return $query->get()->getResult();
            return [
                "portofolio" => $this->paginate($perPage,"portofolio"),
                "pager" => $this->pager
            ];
        } else {
            $this->builder()
                ->select("portofolio.id as portId,deskripsi,judul,client,date,url,img_porto, kategori.kategori")
                ->join("kategori", "kategori.id = portofolio.id_kategori");
            return [
                "portofolio" => $this->paginate($perPage,"portofolio"),
                "pager" => $this->pager
            ];
        }
    }
}
