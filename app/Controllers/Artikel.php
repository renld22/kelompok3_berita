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
        // if (!session()->get('username')) {
        //     return redirect()->route('Login::index');
        // }
        $data = [
            'data' => $this->artikel->join('user', 'user.id_user = artikel.id_user')->paginate('5', 'artikel'),
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
        $data = [
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('konten'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'gambar' => $this->request->getVar('gambar'),
            'tanggal' => $this->request->getVar('tanggal')
            
        ];
        if (!$this->validateData($data, [
            'judul' => 'required',
            'konten' => 'required',
            'ringkasan' => 'required',
            'gambar' => 'required',
            'tanggal' => 'required'
        ])) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

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
                'user' => $this->user->findAll()
            ];
        
    

        return view('artikel/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'judul' => $this->request->getVar('judul'),
            'konten' => $this->request->getVar('konten'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'gambar' => $this->request->getVar('gambar'),
            'tanggal' => $this->request->getVar('tanggal')

        ];
        if (!$this->validateData($data, [
            'judul' => 'required',
            'konten' => 'required',
            'ringkasan' => 'required',
            'gambar' => 'required',
            'tanggal' => 'required'
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
}
