<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // Récupère tous les utilisateurs

        return view('user_list_page', ['users' => $users]); // Passe les utilisateurs à la vue
    }
}
