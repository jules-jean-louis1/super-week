<?php

namespace App\Controller;

class HomeController
{
    public function displayHome()
    {
        require_once __DIR__ . '/../../src/View/home.php';
    }
    public function displayHeader()
    {
        require_once __DIR__ . '/../../elements/header.php';
    }

}