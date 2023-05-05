<?php

namespace App\Controller;
use App\Model\UserModel;
class UserController
{
    public function displayPage()
    {
        require_once __DIR__ . '/../View/users.php';
    }
    public function showUserPage()
    {
        require_once __DIR__ . '/../View/user.php';
    }

    /**
     * @param $id int ID of the user
     * @return void
     */
    public function getInfoById(int $id)
    {
        if (!isset($id)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No id provided']);
            exit();
        }
        $userModel = new UserModel();
        $user = $userModel->findOneById($id);
        if (!$user) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'User not found']);
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['user' => $user]);
            exit();
        }
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