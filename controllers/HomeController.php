<?php
require_once("services/ArticleService.php");
require_once("services/UserService.php");
class HomeController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");
        
    }

    public function login(){
        $this->userService = new UserService();
        if (isset($_POST['login'])){
            $users =  $this->userService->checkLogin($_POST['username'], $_POST['password']);
            $role = $users[0]->getRole();
            if($role == 'admin'){
                $_SESSION['admin'] = $_POST['username'];
                header('location:/CSE485_2023_BTTH02/index.php?controller=article&action=list');
            }
            else{
                echo 'mật khẩu không chính xác';
            }

        }
        include("views/home/login.php");
    }

    public function detail(){
        $id = $_GET['id'];
        $this->articleService = new ArticleService();
        $findArticle = $this->articleService->findArticleById($id);

        include("views/home/detail.php");
    }
}