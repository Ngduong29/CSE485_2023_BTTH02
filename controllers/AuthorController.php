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
        function html_escape($text): string
        {

            $text = $text ?? ''; 

            return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); // Return escaped string
        }
        $this->authorService = new AuthorService();
        $findAuthor = $this->authorService->findAuthorById($_GET['id']);
        if (isset($_POST['save'])) {
            if ($_FILES['hinh_tgia']['name'] == '') {
                $hinhanh = html_escape($findAuthor[0]->getHinh_tgia());
            } else {
                $hinhanh = html_escape($_FILES['hinh_tgia']['name']);
                $hinhanh_tmp = html_escape($_FILES['hinh_tgia']['tmp_name']);       
            }
            $result = $this->authorService->editAuthor($_GET['id'],  html_escape($_POST['ten_tgia']), $hinhanh);
            $target = 'C:/xampp/htdocs/CSE485_2023_BTTH02/views/images/authors/' . basename($_FILES['hinh_tgia']['name']);
            move_uploaded_file($hinhanh_tmp, $target);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=author&action=list');
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
            $hinhanh = $_FILES['hinh_tgia']['name'];
            $hinhanh_tmp = $_FILES['hinh_tgia']['tmp_name'];
            $result = $this->authorService->addAuthor($_POST['ten_tgia'], $hinhanh);
            $target = 'C:/xampp/htdocs/CSE485_2023_BTTH02/views/images/authors/' . basename($_FILES['hinh_tgia']['name']);
            move_uploaded_file($hinhanh_tmp, $target);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=author&action=list');
            }
        }
        include("views/author/add_author.php");
    }

    public function delete(){
        $this->authorService = new AuthorService();
        if (isset($_GET['id'])){
            $result = $this->authorService->deleteAuthor($_GET['id']);
            if($result){
                header('location:/CSE485_2023_BTTH02/index.php?controller=author&action=list');
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