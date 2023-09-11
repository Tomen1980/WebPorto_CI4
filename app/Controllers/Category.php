<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{

    protected $CategoryModel;

    public function __construct()
    {
        $this->CategoryModel = new CategoryModel();
    }

    public function index()
    {

        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        $data = [
            "title" => "Category",
            "category" => $this->CategoryModel->getCategory()
        ];
        return view('admin/category/index', $data);
    }

    public function formAddCategory(): string
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }
        $data = [
            "title" => "Category",
        ];

        return view('admin/category/formAddCategory',$data);
    }

    public function addCategory()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} only charachter',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        };

        $data = [
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->CategoryModel->insert($data);
        return redirect()->to(base_url("/admin/category"));
    }

    public function deleteCategory($id)
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        $this->CategoryModel->where('id', $id)->delete();
        return redirect()->to(base_url("/admin/category"));
    }

    public function formUpdateCategory($id): string
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        $data = [
            "title" => "Category",
            "category" => $this->CategoryModel->getCategory($id)
        ];
        return view('admin/category/formUpdateCategory', $data);
    }

    public function updateCategory()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} only charachter',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        };

        $data = [
            "id" => $this->request->getVar("id"),
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->CategoryModel->save($data);
        return redirect()->to(base_url("admin/category"));
    }
}
