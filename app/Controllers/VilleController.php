<?php

namespace App\Controllers;
class VilleController extends BaseController
{
    public function paris()
    {
        return view('villes/paris_page');
    }
    public function marseille()
    {
        return view('villes/marseille_page');
    }

    public function lille()
    {
        return view('villes/lille_page');
    }

    public function lyon()
    {
        return view('villes/lyon_page');
    }

    public function rennes()
    {
        return view('villes/rennes_page');
    }
}