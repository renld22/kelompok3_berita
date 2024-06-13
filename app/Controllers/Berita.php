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
            'data' => $this->artikel->join("user", "user.id_user = artikel.id_user")->select("artikel.*, user.name")->findAll(),
            'title' => 'Blog',
        ];
        return view('blog/berita', $data);
    }

    public function detail($id)
    {
        // Ambil artikel berdasarkan id
        $artikel = $this->artikel->join("user", "user.id_user = artikel.id_user")->select("artikel.*, user.name")->where('id_artikel', $id)->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'artikel' => $artikel,
            'title' => 'Detail Artikel',
        ];

        return view('blog/detail', $data);
    }
}
