<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Berita extends BaseController
{
    protected $artikel;
    public function __construct()
    {
        $this->artikel = new ArtikelModel();
    }

    public function index()
    {
        $data = [
            'data' => $this->artikel->join("user","user.id_user = artikel.id_user")->select("artikel.*, user.name")->findAll(),
            'title' => 'Blog',
        ];
        return view('blog/berita', $data);
    }
}
