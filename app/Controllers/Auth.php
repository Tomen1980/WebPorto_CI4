<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $AuthModel;
    protected $db;
    protected $builder;
    protected $key, $encrypter;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->key = "sha512";
        $this->encrypter = "ioashdkhasdiwh";
    }

    public function index()
    {
        if (session()->get("login")) {
            return redirect()->to(base_url("admin"));
        } else {
            $data = [
                "title" => "Login"
            ];
            return view('auth/login', $data);
        }
    }
    public function admin()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('auth');

        $builder->select("auth.id as authId, email, username,password,profile.img_profile");
        $builder->join("profile", "profile.id_profile= auth.id");
        $builder->where("auth.id", session()->get("id"));
        $query = $builder->get();

        if (session()->get("login")) {
            $data = [
                "title" => "Admin",
                "auth" => $query->getResultArray()[0]
            ];
            // return d($data);
            return view('admin/admin', $data);
        } else {
            return redirect()->to(base_url() . "login");
        }
    }
    public function validation()
    {

        $user = $this->request->getVar('username');
        $pass = $this->request->getVar('password');
        $data = $this->AuthModel->getAuth($user);

        if ($data) {
            if ($data["password"] === hash_hmac($this->key, $pass, $this->encrypter)) {
                session()->set([
                    "username" => $data["username"],
                    "id" => $data["id"],
                    "login" => true
                ]);
                return redirect()->to(base_url("admin"));
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username or Password is Wrong');
            return redirect()->back();
        }
    }

    public function formUpdateAccount()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }
        $data = [
            "title" => "Admin",
            "auth" => $this->AuthModel->getById(session()->get("id")),
            "validation" => \Config\Services::validation()
        ];
        return view('admin/formUpdateAccount', $data);
    }

    public function updateAccount()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} must required',
                    'min_length' => '{field} Min 4 charachter',
                    'max_length' => '{field} Max 20 charchter',
                ]
            ],
            'passwordVerify' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password not Match',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        // $data = [
        //     "auth" => $this->AuthModel->getById(session()->get("id"))
        // ];

        if (!($this->request->getVar("password") === $this->request->getVar("passwordVerify"))) {
            return redirect()->to(base_url("admin/account"));
        };
        $this->AuthModel->save([
            "id" => $this->request->getVar("id"),
            "email" => $this->request->getVar("email"),
            "username" => $this->request->getVar("username"),
            "password" => hash_hmac($this->key, $this->request->getVar("password"), $this->encrypter),
        ]);
        return redirect()->to("/admin");
    }

    public function logout()
    {
        if (session()->get("login") == false) {
            return redirect()->to(base_url() . "login");
        }

        session()->destroy();
        return redirect()->to(base_url() . "login");
    }
}
