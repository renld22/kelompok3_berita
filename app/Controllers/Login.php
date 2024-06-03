<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function process()
    {
        $user = new UserModel();
        $username = $this->request->getVar('username');
        $password = ($this->request->getVar('password'));
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        if (!$this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }
        $dataUser = $user->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['name'],
                    'hak_akses' => $dataUser['hak_akses'],
                    'id_user' => $dataUser['id_user'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', ['Username & Password Salah']);
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', ['Username & Password Salah']);
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}