<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/user_list.css') ?>">
    <title>Liste des utilisateurs</title>
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <img src="<?= base_url('public/img/logo1.png') ?>" alt="Logo" class="logo">
            <ul>
                <li><a href="<?= base_url('/') ?>">Accueil</a></li>
                <li><a href="">Mon compte</a></li>
                <li><a href="<?= base_url('/logout') ?>">Se Deconnecter</a></li>
            </ul>
        </nav>
    </div>
    <div class="array">
        <h1>Liste des utilisateurs</h1>
        <table border="1">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Numéro</th>
                <th>Adresse</th>
                <th>Rôle</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo esc($user['id']); ?></td>
                        <td><?php echo esc($user['username']); ?></td>
                        <td><?php echo esc($user['firstname']); ?></td>
                        <td><?php echo esc($user['name']); ?></td>
                        <td><?php echo esc($user['email']); ?></td>
                        <td><?php echo esc($user['number']); ?></td>
                        <td><?php echo esc($user['address']); ?></td>
                        <td><?php echo esc($user['role']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Aucun utilisateur trouvé</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>