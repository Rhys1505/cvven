<?php

namespace App\Controllers;
use App\Models\UserModel;

class Client extends BaseController
{
    public function edit()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        return view('account_page', ['user' => $user]);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateData()
    {
        helper(['form']);

        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $rules = [
            'name'      => 'required',
            'firstname' => 'required',
            'email'     => 'required|valid_email',
            'address'   => 'required',
            'number'    => 'required|numeric|exact_length[10]',

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'firstname' => $this->request->getPost('firstname'),
            'email'     => $this->request->getPost('email'),
            'address'   => $this->request->getPost('address'),
            'number'    => $this->request->getPost('number'),

        ];
        echo '<pre>';
        print_r($data); // ← vérifie que tout est bien là
        echo '</pre>';

        $userModel->update($userId, $data);

        return redirect()->to('/connect')->with('success', 'Vos informations ont été mises à jour avec succès !');
    }

    public function UpdatePassword()
    {
        // Vérifie si l'utilisateur est connecté
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        // Récupère les données du formulaire
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Vérifie si l'ancien mot de passe est correct
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'L\'ancien mot de passe est incorrect.');
        }

        // Vérifie si le nouveau mot de passe et la confirmation correspondent
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Les nouveaux mots de passe ne correspondent pas.');
        }

        // Hash le nouveau mot de passe
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Met à jour le mot de passe dans la base de données
        $userModel->update($userId, ['password' => $hashedPassword]);

        // Redirige avec un message de succès
        return redirect()->to('/account')->with('success', 'Votre mot de passe a été mis à jour.');
    }


}
