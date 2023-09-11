<?php

namespace App\Controllers;

use App\Models\CategoryModel;

use function PHPSTORM_META\map;

class Home extends BaseController
{
    protected $category;
    protected $db;
    protected $builderProf;
    protected $builderPorto;
    protected $builderAuth;
    protected $email;
    public function __construct()
    {


        $this->db = \Config\Database::connect();
        $this->category = new CategoryModel();
        $this->builderProf = $this->db->table("profile");
        $this->builderPorto = $this->db->table("portofolio");
        $this->builderAuth = $this->db->table("auth");
        $this->email = \Config\Services::email();
    }

    public function index(): string
    {
        // quey profile
        $this->builderProf->select("name,passion,city,deskripsi_singkat");
        $profile = $this->builderProf->get();

        // query content/portofolio
        $this->builderPorto->select("id,judul,img_porto");
        $porto = $this->builderPorto->get();
        // return d($porto->getResult());
        $data = [
            "title" => "Home",
            "nav" => $this->category->getCategory(),
            "profile" => $profile->getResultArray()[0],
            "porto" => $porto->getResult()
        ];
        return view('landingPage/welcome_message', $data);
    }
    public function about()
    {
        $this->builderProf->select("*,auth.email");
        $this->builderProf->join("auth", "auth.id = profile.id_profile");
        $profile = $this->builderProf->get();
        $data = [
            "title" => "About",
            "nav" => $this->category->getCategory(),
            "profile" => $profile->getResultArray()[0],
        ];
        // return d($data);
        return view('landingPage/about', $data);
    }
    public function gallery()
    {
        $this->builderPorto->select("id,judul,img_porto");
        $porto = $this->builderPorto->get();
        
        $data = [
            "title" => "Gallery",
            "nav" => $this->category->getCategory(),
            "porto" => $porto->getResult()
        ];
        return view('landingPage/gallery', $data);
    }
    public function services()
    {
        $data = [
            "title" => "Services",
            "nav" => $this->category->getCategory()
        ];
        return view('landingPage/services', $data);
    }
    public function contact()
    {
        $this->builderProf->select("auth.email,phone,city");
        $this->builderProf->join("auth", "auth.id = profile.id_profile");
        $query = $this->builderProf->get();
        $data = [
            "title" => "Contact",
            "nav" => $this->category->getCategory(),
            "contact" => $query->getResultArray()[0]
        ];
        return view('landingPage/contact', $data);
    }

    public function sendMail()
    {
        $pengirim = $this->request->getVar("name");
        $emailPengirim = $this->request->getVar("email");
        $subject = $this->request->getVar("subject");
        $message = $this->request->getVar("message");

        $email = service("email");
        $email->setTo("agungjumantoroandrian@gmail.com");
        $email->setFrom("wanoroseto128@gmail.com", "ini agung");
        $email->setSubject("Mencoba");
        $email->setMessage("Halasjdoaisj ini coba kirim email");
        if ($email->send()) {
            return "email terkirim";
        } else {
            $data = $email->printDebugger(["headers"]);
            return $data;
        }
    }

    public function detailCategory($id)
    {
        $this->builderPorto->select("id,judul,img_porto");
        $this->builderPorto->where("id_kategori",$id);
        $porto = $this->builderPorto->get();

        $data = [
            "title" => "Detail ".$this->category->getCategory($id)["kategori"],
             "nav" => $this->category->getCategory(),
            "porto" => $porto->getResult(),
            "judul" => $this->category->getCategory($id)["kategori"],
            
        ];
        return view("landingPage/detailCategory",$data);
    }

    public function detailPortofolio($id){
        
         $this->builderPorto->select("portofolio.*,kategori.kategori");
        $this->builderPorto->join("kategori","kategori.id = portofolio.id_kategori");
        $this->builderPorto->where("portofolio.id",$id);
        $porto = $this->builderPorto->get();

        $data = [
            "title" => "Detail Portofolio",
             "nav" => $this->category->getCategory(),
             "porto" => $porto->getResultArray()[0]
        ];

        // return d($data);
        return view("landingPage/detailPorto",$data);
    }
}
