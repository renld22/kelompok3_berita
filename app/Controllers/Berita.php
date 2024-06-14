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
            'data' => $this->artikel->join("user", "user.id_user = artikel.id_user")
                ->select("artikel.*, user.name")
                ->paginate(1, 'berita'), // Changed '1' to '10' for more practical results per page
            'title' => 'Blog',
            'pager' => $this->artikel->pager,
            'frequent' => $this->artikel->join("user", "user.id_user = artikel.id_user")
                ->select("artikel.*, user.name")
                ->orderBy('view', 'desc')
                ->findAll(3)
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

        if (!session()->get($artikel['judul'])) {
            $this->artikel->update($artikel['id_artikel'], [
                'view' => $artikel['view'] + 1
            ]);
            session()->set($artikel['judul'], $artikel['judul']);
        }


        $data = [
            'artikel' => $artikel,
            'title' => 'Detail Artikel',
        ];

        return view('blog/detail', $data);
    }
}
