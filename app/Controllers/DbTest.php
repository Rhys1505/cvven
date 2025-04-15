<?php

// app/Controllers/DatabaseTest.php
namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;


class DbTest extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $query = $db->query("SELECT name FROM users");
        $result = $query->getResult();
        print_r($result); // Affiche le résultat de la requête
        // Exécute une requête SQL

    }

}

