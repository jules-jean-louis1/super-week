<?php

namespace App\Controller;

class HomeController
{
    public function displayHomeBody()
    {
        require_once __DIR__ . '/../../src/View/home.php';
    }
    public function displayHead($title)
    {
        require_once __DIR__ . '/../../elements/head.php';
    }
    public function displayHeader()
    {
        require_once __DIR__ . '/../../elements/header.php';
    }
    public function displayFooter()
    {
        require_once __DIR__ . '/../../elements/footer.php';
    }
}