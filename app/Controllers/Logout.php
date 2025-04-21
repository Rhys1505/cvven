<?php


namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        session()->destroy(); // Déconnecte l'utilisateur (même si aucune session active)
        return redirect()->to('/login'); // Redirige vers la page de connexion
    }
}
