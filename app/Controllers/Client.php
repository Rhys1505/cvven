<?php

namespace App\Controllers;

use App\Models\UserModel;

class Client extends BaseController
{
    /**
     * Affiche la page de gestion du compte
     */
    public function update()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $userId    = session()->get('user_id');
        $user      = $userModel->find($userId);

        return view('account_page', [
            'user' => $user,
        ]);
    }

    /**
     * Traite la mise à jour des données profil (username, number…)
     */
    public function updateData()
    {
        helper(['form']);

        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel  = new UserModel();
        $userId     = session()->get('user_id');
        $primaryKey = $userModel->primaryKey;

        // règles : on exclut l'enregistrement courant de la vérif d'unicité
        $rules = [
            'username' => [
                'rules'  => "required|min_length[3]|is_unique[{$userModel->table}.username,{$primaryKey},{$userId}]",
                'errors' => [
                    'required'   => 'Le pseudonyme est obligatoire.',
                    'min_length' => 'Le pseudonyme doit contenir au moins 3 caractères.',
                    'is_unique'  => 'Ce pseudonyme est déjà pris.',
                ],
            ],
            'number'   => [
                'rules'  => "required|is_unique[{$userModel->table}.number,{$primaryKey},{$userId}]",
                'errors' => [
                    'required'  => 'Le numéro de téléphone est obligatoire.',
                    'is_unique' => 'Ce numéro de téléphone est déjà pris.',
                ],
            ],
        ];

        // validation
        if (! $this->validate($rules)) {
            $user = $userModel->find($userId);

            return view('account_page', [
                'user'       => $user,
                'validation' => $this->validator,
                'old_input'  => $this->request->getPost(),
            ]);
        }

        // préparation des données à sauvegarder
        $data = [
            'name'      => $this->request->getPost('name'),
            'firstname' => $this->request->getPost('firstname'),
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'address'   => $this->request->getPost('address'),
            'number'    => $this->request->getPost('number'),
        ];

        // tentative de mise à jour
        if ($userModel->update($userId, $data) === false) {
            $user = $userModel->find($userId);

            return view('account_page', [
                'user'      => $user,
                'error_msg' => 'Erreur lors de la mise à jour.',
            ]);
        }

        // succès
        return redirect()
            ->to('/account')
            ->with('success', 'Vos informations ont été mises à jour avec succès !');
    }

    /**
     * Traite la modification du mot de passe
     */
    public function updatePassword()
    {
        helper(['form']);

        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $userId    = session()->get('user_id');
        $user      = $userModel->find($userId);

        // données du formulaire
        $oldPwd     = $this->request->getPost('old_password');
        $newPwd     = $this->request->getPost('new_password');
        $confirmPwd = $this->request->getPost('confirm_password');

        // 1) Ancien mot de passe
        if (! password_verify($oldPwd, $user['password'])) {
            return view('account_page', [
                'user'      => $user,
                'error_msg' => 'L’ancien mot de passe est incorrect.',
            ]);
        }

        // 2) Confirmation
        if ($newPwd !== $confirmPwd) {
            return view('account_page', [
                'user'      => $user,
                'error_msg' => 'Les nouveaux mots de passe ne correspondent pas.',
            ]);
        }

        // 3) Hash et sauvegarde
        $hashed = password_hash($newPwd, PASSWORD_DEFAULT);
        $userModel->update($userId, ['password' => $hashed]);

        return redirect()
            ->to('/account')
            ->with('success', 'Votre mot de passe a été mis à jour.');
    }
}
