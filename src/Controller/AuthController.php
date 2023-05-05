<?php

namespace App\Controller;
use App\Model\UserModel;
class AuthController extends AbstractController
{
    /**
     * @return void
     * Display the register form
     */
    public function showRegisterForm()
    {
        require_once __DIR__ . '/../../src/View/register.php';
    }

    /**
     * @return void
     * Display the login form
     */
    public function showLoginForm()
    {
        require_once __DIR__ . '/../../src/View/login.php';
    }

    /**
     * @param $field
     * @return false|mixed
     */
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
            $errors['password'] = 'Le mot de passe doit contenir au moins 6 caractères';
        }
        if (!$confirmPassword) {
            $errors['confirm_password'] = 'Le champ confirmation du mot de passe est requis';
        }
        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
        }

        if (count($errors) === 0) {
            $userModel = new UserModel();
            $users = $userModel->verifyEmail($email);
            if ($users === false) {
                $userModel->register($email, $fName, $lName, $password);
                $errors['success'] = 'Votre compte a bien été créé';
            } else {
                $errors['email'] = 'L\'email existe déjà';
            }
        }
        header('Content-Type: application/json');
        echo json_encode($errors);
        exit();
    }
    public function login()
    {
        $email = $this->verifyField('Email');
        $password = $this->verifyField('Password');
        $errors = [];
        if (!$email) {
            $errors['email'] = 'Le champ email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champ email n\'est pas valide';
        }
        if (!$password) {
            $errors['password'] = 'Le champ mot de passe est requis';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 6 caractères';
        }
        if (count($errors) === 0) {
            $userModel = new UserModel();
            $login = $userModel->login(htmlspecialchars($email), htmlspecialchars($password));
            if ($login === false) {
                $errors['error'] = 'L\'email ou le mot de passe est incorrect';
            } else {
                $_SESSION['id'] = $login['id'];
                $_SESSION['email'] = $login;
                $errors['success'] = 'Vous êtes connecté';
            }
        }
        header('Content-Type: application/json');
        echo json_encode($errors);
        exit();
    }

    /**
     * @return void
     * Logout the user
     */
    public function logout()
    {
        session_destroy();
        header('Location: /super-week');
        exit();
    }
}