<?php
require_once 'services/AuthorService.php';
class AuthorController
{
    // Hàm xử lý hành động index
    public function index()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        echo "Tương tác với View from Article";
    }

    public function edit()
    {
        $this->authorService = new AuthorService();
        $findAuthor = $this->authorService->findAuthorById($_GET['id']);
        if (isset($_POST['save'])) {
            $result = $this->authorService->editAuthor($_GET['id'], $_POST['ten_tgia']);
            if ($result) {
                header('location:/btth02v2/index.php?controller=author&action=list');
            }
        }

        include("views/author/edit_author.php");
    }

    public function add()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        $this->authorService = new AuthorService();
        if (isset($_POST['submit'])) {
            $result = $this->authorService->addAuthor($_POST['ten_tgia']);
            if ($result) {
                header('location:/btth02v2/index.php?controller=author&action=list');
            }
        }
        include("views/author/add_author.php");
    }

    public function delete(){
        $this->authorService = new AuthorService();
        if (isset($_GET['id'])){
            $result = $this->authorService->deleteAuthor($_GET['id']);
            if($result){
                header('location:/btth02v2/index.php?controller=author&action=list');
            }
        }
        include("views/author/list_author.php");
    }

    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/list_author.php");
    }
}