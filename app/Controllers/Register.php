<?php

namespace App\Controllers;

class register extends BaseController
{
    public function index(): string
    {
        return view('register_page');
    }
}
