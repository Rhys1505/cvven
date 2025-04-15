<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // Récupère tous les utilisateurs

        return view('user_list', ['users' => $users]); // Passe les utilisateurs à la vue
    }
}
