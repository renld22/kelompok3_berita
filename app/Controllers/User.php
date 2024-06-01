<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user = new UserModel();

        $this->rules = [
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required',
            'hak_akses' => 'required'
        ];
    }

    public function index()
    {
        // if (!session()->get('username')) {
        //     return redirect()->route('Login::index');
        // }
        $data = [
            'data' => $this->user->paginate('5', 'user'),
            'title' => 'Data User',
            'pager' => $this->user->pager,
        ];
        return view('user/index', $data);
    }

    public function tambah()
    {
        return view('user/tambah', ['title' => 'Tambah Data User']);
    }

    public function save()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_user' => $this->request->getVar('nama_user')
        ];
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->user->save($data);
        return redirect()->route('user::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data user',
            'user' => $this->user->find($id),
        ];

        return view('user/ubah', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama_user' => $this->request->getVar('nama_user')
        ];
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->user->update($id, $data);

        return redirect()->route('user::index')->with('message', 'Ubah Data Bsehasil');
    }

    public function hapus($id)
    {
        $this->user->delete($id);
        return redirect()->route('user::index')->with('message', 'Hapus Data Bsehasil');
    }
}
