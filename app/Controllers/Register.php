<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index(): string
    {
        return view('register_page');
    }

    public function create(): string
    {
        helper(['form']);
        if ($this->request->getMethod() === 'POST') {
            $userModel = new UserModel();
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required'    => 'L’adresse email est obligatoire.',
                        'valid_email' => 'Veuillez entrer une adresse email valide.',
                        'is_unique'   => 'Cette adresse email est déjà utilisée.',
                    ]
                ],
                'username' => [
                    'rules' => 'required|min_length[3]|is_unique[users.username]',
                    'errors' => [
                        'required'      => 'Le pseudonyme est obligatoire.',
                        'min_length'    => 'Le pseudonyme doit contenir au moins 3 caractères.',
                        'is_unique'     => 'Ce pseudonyme est déjà pris.',
                    ]
                ],
                'number' => [
                    'rules' => 'required|is_unique[users.number]',
                    'errors' => [
                        'required'      => 'Le numéro de téléphone est obligatoire.',
                        'is_unique'     => 'Ce numéro de téléphone est déjà pris.',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required'      => 'Le mot de passe est obligatoire.',
                        'min_length'    => 'Le mot de passe doit contenir au moins 6 caractères.',
                    ]
                ],
            ];


            $data = [
                'username' => $this->request->getPost('username'),
                'name' => $this->request->getPost('name'),
                'firstname' => $this->request->getPost('firstname'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'number' => $this->request->getPost('number'),
                'address' => $this->request->getPost('address'),
            ];

            if (! $this->validate($rules)) {
                return view('register_page', [
                    'validation' => $this->validator
                ]);
            }

            $userModel->save($data);

            return view('login_page', ['success_msg' => 'Inscription réussie. Vous pouvez vous connecter.'
            ]);
        }

        return view('register_page', ['error_msg' => 'Erreur lors de l\'inscription.']);

    }
}