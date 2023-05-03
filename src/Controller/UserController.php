<?php

namespace App\Controller;
use App\Model\UserModel;
class UserController
{
    public function displayPage()
    {
        require_once __DIR__ . '/../View/users.php';
    }
    public function getInfoById($id)
    {
        $userModel = new UserModel();
        $user = $userModel->findOneById($id);
        require_once __DIR__ . '/../View/user.php';;
    }
    public function getAllUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        header('Content-Type: application/json');
        echo json_encode($users);
        exit();
    }
}