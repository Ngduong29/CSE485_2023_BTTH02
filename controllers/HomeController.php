<?php
require_once("services/ArticleService.php");
require_once("services/UserService.php");
class HomeController
{
    // Hàm xử lý hành động index
    public function index()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");

    }

    public function login()
    {
        session_start();
        $this->userService = new UserService();
        if (isset($_POST['Login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $users = $this->userService->checkLogin($username);
            if ($users > 0) {
                $pass_hash = $users[0]->getPassword();
                $role = $users[0]->getRole();
                if ($pass_hash = $password) {
                    if ($role == 'admin') {
                        $_SESSION['admin'] = $_POST['username'];
                        header('location:/CSE485_2023_BTTH02/index.php?controller=article&action=list');
                    } else {
                        echo 'mật khẩu không chính xác';
                    }
                }
            }

        }
        include("views/home/login.php");
    }
    public function logout()
    {
        session_start();
        unset($_SESSION['admin']);
        session_destroy();
        header("Location:/CSE485_2023_BTTH02/index.php?controller=home&action=login");
        exit;
    }

    public function detail()
    {
        $id = $_GET['id'];
        $this->articleService = new ArticleService();
        $findArticle = $this->articleService->findArticleById($id);

        include("views/home/detail.php");
    }
}