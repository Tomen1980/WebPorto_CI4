<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{

    protected $ProfileModel;

    public function __construct()
    {
        $this->ProfileModel = new ProfileModel();
    }

    public function index(): string
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }


        $id = session()->get('id');
        $data = [
            "title" => "Profile",
            "profile" => $this->ProfileModel->getById($id)
        ];
        return view('admin/profile/index', $data);
    }

    public function formUpdateProfile()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        $id = session()->get('id');
        $data = [
            "title" => "Profile",
            "profile" => $this->ProfileModel->getById($id)
        ];
        return view('admin/profile/formUpdateProfile', $data);
    }

    public function updateProfile()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'passion' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'bod' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must required',
                ]
            ],
            'website' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must required',
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must required',
                    'numeric' => '{field} must numeric'
                ]
            ],
            'city' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'age' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must required',
                    'numeric' => '{field} must numeric',
                ]
            ],
            'degree' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'img_profile' => [
                'rules' => 'max_size[img_profile,1024]|is_image[img_profile]|mime_in[img_profile,image/jpg,image/jpeg, image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large (Max 1 mb) ',
                    'is_image' => 'file must image',
                    'mime_in' => 'what you select is not an image'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 15 charachter'
                ]
            ],
            'deskripsi_singkat' => [
                'rules' => 'required|min_length[15]|max_length[150]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 15 charachter',
                    'max_length' => '{field} Max 100 charachter'
                ]
            ],
        ])) {


            return redirect()->back()->withInput();
        }

        // ambil image 
        $fileImage = $this->request->getFile('img_profile');
        // cek image lama atau baru 
        if ($fileImage->getError() == 4) {
            // membuat nama rendom pada foto 
            $fileName = $this->request->getVar("oldImage");
        } else {
            $fileName = $fileImage->getRandomName();
            
            $fileImage->move('img', $fileName);
            $path = 'img/' . $this->request->getVar("oldImage");
            unlink($path);
        }

        $data = [
            "id" => $this->request->getVar('id'),
            "id_profile" => $this->request->getVar('id_profile'),
            "name" => $this->request->getVar('name'),
            "deskripsi" => $this->request->getVar('deskripsi'),
            "deskripsi_singkat" => $this->request->getVar('deskripsi_singkat'),
            "img_profile" => $fileName,
            "passion" => $this->request->getVar('passion'),
            "bod" => $this->request->getVar('bod'),
            "website" => $this->request->getVar('website'),
            "phone" => $this->request->getVar('phone'),
            "city" => $this->request->getVar('city'),
            "age" => $this->request->getVar('age'),
            "degree" => $this->request->getVar('degree'),
            "freelance" => $this->request->getVar('freelance'),
        ];

        $this->ProfileModel->save($data);

        return redirect()->to(base_url("admin/profile"));
    }
}
