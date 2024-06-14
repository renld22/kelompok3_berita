<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function edit()
    {
        $id = session()->get('id_user');
        $data = [
            'title' => 'Edit Data user',
            'user' => $this->user->find($id),
        ];

        return view('user/profil', $data);
    }

    public function update()
    {
        $id = session()->get('id_user');
        $data = [
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),

        ];
        if (!$this->validateData($data, [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
        ])) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->user->update($id, $data);

        return redirect()->route('Profil::edit')->with('message', 'Ubah Data Bsehasil');
    }
}