<?php

namespace App\Controller;
use App\Model\BooksModel;
use App\Model\MyModel;
class BookController
{
    public function showWriteForm()
    {
        require_once __DIR__ . '/../../src/View/addBook.php';
    }
    public function displayBooks()
    {
        require_once __DIR__ . '/../../src/View/books.php';
    }
    public function showBookPage()
    {
        require_once __DIR__ . '/../../src/View/book.php';
    }
    public function verifyField($field)
    {
        if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
            return $_POST[$field];
        } else {
            return false;
        }
    }
    public function addBook()
    {
        $errors = [];
        if (isset($_SESSION['id'])) {
            $title = $this->verifyField('title');
            $description = $this->verifyField('description');
            if (!$title) {
                $errors['title'] = 'Le champ titre est requis';
            } else if (strlen($title) < 3) {
                $errors['title'] = 'Le titre doit contenir au moins 3 caractères';
            }
            if (!$description) {
                $errors['description'] = 'Le champ description est requis';
            } else if (strlen($description) < 10) {
                $errors['description'] = 'La description doit contenir au moins 10 caractères';
            }
            if (count($errors) === 0) {
                $bookModel = new MyModel();
                $bookModel->addBook(htmlspecialchars($title), htmlspecialchars($description), htmlspecialchars($_SESSION['id']));
                $errors['success'] = 'Le livre a bien été ajouté';
            } else {
                $errors['user'] = 'Le livre n\'a pas pu être ajouté';
            }
        } else {
            $errors['user'] = 'Vous devez être connecté pour ajouter un livre';
        }
        header('Content-Type: application/json');
        echo json_encode($errors);
        exit();
    }
    public function findAll()
    {
        $bookModel = new BooksModel();
        $books = $bookModel->findAll();
        header('Content-Type: application/json');
        echo json_encode($books);
        exit();
    }
    public function getInfoById($id)
    {
        if (empty($id)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'L\'id est requis']);
            exit();
        } else if (!is_numeric($id)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'L\'id doit être un nombre']);
            exit();
        } else if ($id < 1) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'L\'id doit être supérieur à 0']);
            exit();
        } else {
            $bookModel = new BooksModel();
            $book = $bookModel->getInfoById(htmlspecialchars($id));
            if (!$book) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Le livre n\'existe pas']);
                exit();
            } else {
                header('Content-Type: application/json');
                echo json_encode(['book' => $book]);
                exit();
            }
        }
    }
}