<?php

namespace App\Controller;
use App\Model\MyModel;
class AuthController
{
    public function showRegisterForm()
    {
        require_once __DIR__ . '/../../src/View/register.php';
    }
    public function verifyField($field)
    {
        if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
            return $_POST[$field];
        } else {
            return false;
        }
    }
    public function register()
    {
        $email = $this->verifyField('Email');
        $fName = $this->verifyField('fname');
        $lName = $this->verifyField('lname');
        $password = $this->verifyField('Password');
        $confirmPassword = $this->verifyField('confirm_password');
        $errors = [];

        if (!$email) {
            $errors['email'] = 'Le champ email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champ email n\'est pas valide';
        }
        if (!$fName) {
            $errors['fname'] = 'Le champ prénom est requis';
        }
        if (!$lName) {
            $errors['lname'] = 'Le champ nom est requis';
        }
        if (!$password) {
            $errors['password'] = 'Le champ mot de passe est requis';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
        if (!$confirmPassword) {
            $errors['confirm_password'] = 'Le champ confirmation du mot de passe est requis';
        }
        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
        }

        if (count($errors) === 0) {
            $userModel = new MyModel();
            $users = $userModel->verifyEmail($email);
            if ($users === false) {
                $userModel->register($email, $fName, $lName, $password);
                $errors['success'] = 'Votre compte a bien été créé';
            } else {
                $errors['email'] = 'L\'email existe déjà';
            }
        }
        require_once __DIR__ . '/../View/register.php';
    }

}