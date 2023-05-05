<?php

namespace App\Model;
use App\Model\Database;
class UserModel extends Database
{
    /**
     * @return array
     */
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOneById(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT user.id, user.email,user.first_name, user.last_name FROM user WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function verifyEmail(string $email)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $req->bindParam(':email', $email);
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        if (count($users) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $email Email of the user
     * @param string $fName First name of the user
     * @param string $lName Last name of the user
     * @param string $password  Password of the user
     * @return void Return nothing
     */
    public function register(string $email, string $fName, string $lName, string $password)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $req->execute([
            ':email' => $email,
            ':first_name' => $fName,
            ':last_name' => $lName,
            ':password' => $password
        ]);
    }

    /**
     * @param string $email Email of the user
     * @param string $password Password of the user
     * @return array|false|null Return the user if the password is correct, false if the password is incorrect and null if the user doesn't exist
     */
    public function login(string $email, string $password)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute([
            ':email' => $email
        ]);
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        if ($user === false) {
            return false;
        } else {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        }
    }
}