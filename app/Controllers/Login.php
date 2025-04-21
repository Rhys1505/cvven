<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index(): string
    {
        // Affiche le formulaire de connexion
        return view('login_page');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username != "" && $password != "") {
            $userModel = new UserModel();
            // Récupère l'utilisateur par username
            $user = $userModel->where('username', $username)->first();

            // Vérifie si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($password, $user['password'])) {
                // Crée une session pour l'utilisateur connecté
                session()->set([
                    'isLoggedIn' => true,
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'role'       => $user['role'],
                ]);
                    return redirect()->to('/connect');
            }

            // Si l'utilisateur n'est pas trouvé ou mot de passe incorrect
            return view('login_page', ['error_msg' => 'Identifiant ou mot de passe incorrect !']);
        } else {
            return view('login_page', ['error_msg' => 'Veuillez remplir tous les champs.']);
        }
    }
    public function connect()
    {
        if (session()->get('isLoggedIn') && session()->get('role') == 'client') {
            return view('client_page');
        }elseif (session()->get('isLoggedIn') && session()->get('role') == 'admin') {
            return view('admin_page');
        }else{
            return redirect()->to('/login');
        }
    }
}
