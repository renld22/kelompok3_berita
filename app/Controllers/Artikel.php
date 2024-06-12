<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikel;
    protected $rules;

    public function __construct()
    {
        $this->artikel = new ArtikelModel();

        // $this->rules = [
        //     'username' => 'required',
        //     'password' => 'required',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'hak_akses' => 'required'
        // ];
    }

    public function index()
    {
        
        $berita = $this->artikel->join('user', 'user.id_user = artikel.id_user');
        if (session()->get('hak_akses') == 2) {
            $berita->where('artikel.id_user', session()->id_user);
        }
        
        $data = [
            'data' => $berita->paginate('5', 'artikel'),
            'title' => 'Data Artikel',
            'pager' => $this->artikel->pager,
        ];
        return view('artikel/index', $data);
    }

    public function tambah()
    {
        return view('artikel/tambah', ['title' => 'Tambah Data Artikel']);
    }

    public function save()
    {
        $gambar = $this->request->getFile('gambar');
        $filename = $gambar->getRandomName();
        $gambar->move(ROOTPATH . 'public/gambar', $filename);
        $tanggal = (new \DateTime())->format('Y-m-d');
        $data = [
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('konten'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'gambar' => $filename,
            'tanggal' => $tanggal

        ];
        if (!$this->validateData($data, [
            'judul' => 'required',
            'konten' => 'required',
            'ringkasan' => 'required',
            'gambar' => 'required',
        ])) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['id_user'] = session()->get('id_user');

        // var_dump($data); die;

        $this->artikel->save($data);
        return redirect()->route('Artikel::tambah')->with('success', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {


        $data = [
            'title' => 'Edit Data artikel',
            'data' => $this->artikel->join('user', 'user.id_user = artikel.id_user')
                ->findAll(),
            'artikel' => $this->artikel->find($id),
        ];



        return view('artikel/edit', $data);
    }

    public function update($id)
    {
        $tanggal = (new \DateTime())->format('Y-m-d');
        $data = [
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('konten'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'tanggal' => $tanggal

        ];

        $gambar = $this->request->getFile('gambar');
        if ($gambar->getName()) {
            $filename = $gambar->getRandomName();

            $gambar->move(ROOTPATH . 'public/gambar', $filename);

            $data['gambar'] = $filename;
        }
        if (!$this->validateData($data, [
            'judul' => 'required',
            'konten' => 'required',
            'ringkasan' => 'required',

        ])) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }


        $this->artikel->update($id, $data);

        return redirect()->route('Artikel::index')->with('message', 'Ubah Data Bsehasil');
    }

    public function hapus($id)
    {
        $this->artikel->delete($id);
        return redirect()->route('Artikel::index')->with('message', 'Hapus Data Bsehasil');
    }

    function uploadGambar()
    {
        if ($this->request->getFile('file')) {
            $dataFile = $this->request->getFile('file');
            $fileName = $dataFile->getRandomName();
            $dataFile->move("uploads/berkas/", $fileName);
            echo base_url("uploads/berkas/$fileName");
        }
    }

    // function deleteGambar()
    // {
    //     $src = $this->request->getVar('src');
    //     //--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

    //     //https://localhost:8080/
    //     if ($src) {
    //         $file_name = str_replace(base_url() . "/", "", $src);
    //         if (unlink($file_name)) {
    //             echo "Delete file berhasil";
    //         }
    //     }
    // }

    public function deleteGambar()
    {
        $src = $this->request->getVar('src');

        //https://localhost:8080/
        if ($src) {
            // Get the relative path
            $file_name = str_replace(base_url(), "", $src);
            // Ensure there's no leading slash
            $file_name = ltrim($file_name, '/');

            // Ensure file exists before trying to delete it
            if (file_exists($file_name)) {
                if (unlink($file_name)) {
                    echo "Delete file berhasil";
                } else {
                    echo "Gagal menghapus file";
                }
            } else {
                echo "File tidak ditemukan";
            }
        } else {
            echo "Path tidak diberikan";
        }
    }

    function listGambar()
    {
        $files = array_filter(glob('uploads/berkas/*'), 'is_file');
        $response = [];
        foreach ($files as $file) {
            if (strpos($file, "index.html")) {
                continue;
            }
            $response[] = basename($file);
        }
        header("Content-Type:application/json");
        echo json_encode($response);
        die();
    }
}
