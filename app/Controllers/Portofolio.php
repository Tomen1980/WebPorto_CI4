<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PortofolioModel;

class Portofolio extends BaseController
{
    protected $db, $builder, $PortoModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table("portofolio");
        $this->PortoModel= new PortofolioModel();
    }

    public function index()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };

        $currentPage =  $this->request->getVar("page_portofolio") ? $this->request->getVar("page_portofolio") : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $result = $this->PortoModel->getPagination(5,$keyword);
        }else{
            $result = $this->PortoModel->getPagination(5,$keyword);
        }
        // $query = $this->builder->get();
        // return dd($query->getResult());
        $data = [
            "title" => "Portofolio",
            // "portofolio" => $query->getResult()
            'portofolio' => $result["portofolio"],
            'pager' => $result["pager"],
            'currentPage' => $currentPage
        ];
        // return dd($data);
        return view('admin/portofolio/index', $data);
    }

    public function deletePortofolio($id)
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };
        $this->builder->where("id", $id);
        $query = $this->builder->get();
        $fileName = $query->getResult()[0]->img_porto;

        $path = 'img/portofolio/' . $fileName;
        unlink($path);
        $this->builder->delete(["id" => $id]);
        return redirect()->to("admin/portofolio");
    }

    public function formAddPortofolio()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };

        $model = new CategoryModel();
        $data = [
            "title" => "Portofolio",
            "category" => $model->getCategory()
        ];

        return view("admin/portofolio/formAddPortofolio", $data);
    }

    public function addPortofolio()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 20 charachter',
                ]
            ],
            'kategori' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must required',
                    'numeric' => '{field} must numeric content',
                ]
            ],
            'client' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must required',
                ]
            ],
            'url' => [
                'rules' => 'required|min_length[4]|max_length[100]|valid_url',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                    'valid_url' => '{field} must url not a longer/spacing char',
                ]
            ],
            'img_porto' => [
                'rules' => 'max_size[img_porto,1024]|is_image[img_porto]|mime_in[img_porto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large (Max 1 mb) ',
                    'is_image' => 'file must image',
                    'mime_in' => 'what you select is not an image'
                ]
            ]

        ])) {
            return redirect()->back()->withInput();
        };

        // terima gambar file
        $fileImage = $this->request->getFile("img_porto");
        $fileName = $fileImage->getRandomName();
        //push dalam folder
        $fileImage->move('img/portofolio', $fileName);


        $data = [
            "id" => null,
            "judul" => $this->request->getVar("judul"),
            "deskripsi" => $this->request->getVar("deskripsi"),
            "id_kategori" => $this->request->getVar("kategori"),
            "client" => $this->request->getVar("client"),
            "date" => $this->request->getVar("date"),
            "url" => $this->request->getVar("url"),
            "img_porto" => $fileName
        ];
        $this->builder->insert($data);
        return redirect()->to(base_url("admin/portofolio"));
    }

    public function formUpdatePortofolio($id)
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };

        $this->builder->select("portofolio.id as portId,deskripsi,judul,client,date,url,img_porto, kategori.kategori");
        $this->builder->join("kategori", "kategori.id = portofolio.id_kategori");
        $this->builder->where("portofolio.id",$id);
        $query = $this->builder->get();
        
        // query model 
        $category = new CategoryModel();


        // return dd($query->getResult());
        $data = [
            "title" => "Portofolio",
            "portofolio" => $query->getResultArray()[0],
            "category" => $category->getCategory()    
        ];
        // return d($data);
        return view("admin/portofolio/formUpdatePortofolio",$data);
    }

    public function updatePortofolio()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url("/login"));
        };

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 20 charachter',
                ]
            ],
            'kategori' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must required',
                    'numeric' => '{field} must numeric content',
                ]
            ],
            'client' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must required',
                ]
            ],
            'url' => [
                'rules' => 'required|min_length[4]|max_length[50]|valid_url',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                    'valid_url' => '{field} must url not a longer/spacing char',
                ]
            ],
            'img_porto' => [
                'rules' => 'max_size[img_porto,1024]|is_image[img_porto]|mime_in[img_porto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large (Max 1 mb) ',
                    'is_image' => 'file must image',
                    'mime_in' => 'what you select is not an image'
                ]
            ]

        ])) {
            return redirect()->back()->withInput();
        };

        // terima gambar file
        $fileImage = $this->request->getFile("img_porto");
        if($fileImage->getError() == 4){
            $fileName = $this->request->getVar("oldImage");
        }else{
            $fileName = $fileImage->getRandomName();
            //push dalam folder
            $fileImage->move('img/portofolio/', $fileName);
            $path = "img/portofolio/". $this->request->getVar("oldImage");
            unlink($path);
        }

        $data = [
            "id" => $this->request->getVar("id"),
            "judul" => $this->request->getVar("judul"),
            "deskripsi" => $this->request->getVar("deskripsi"),
            "id_kategori" => $this->request->getVar("kategori"),
            "client" => $this->request->getVar("client"),
            "date" => $this->request->getVar("date"),
            "url" => $this->request->getVar("url"),
            "img_porto" => $fileName
        ];
        $this->builder->where("id",$this->request->getVar("id"));
        $this->builder->update($data);

        return redirect()->to(base_url("admin/portofolio"));
    }

    public function coba(){
        
    }
}
