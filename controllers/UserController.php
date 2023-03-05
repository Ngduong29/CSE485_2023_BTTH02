<?php
require_once 'services/UserService.php';
class UserController
{
    // Hàm xử lý hành động index
    public function index()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        echo "Tương tác với View from Article";
    }

    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        $userService = new UserService();
        $users = $userService->getAllUsers();
        // Nhiệm vụ 2: Tương tác với View
        include("views/user/list_user.php");
    }
    
    public function edit()
    {
        $this->userService = new UserService();
        $findUser = $this->userService ->findUserById($_GET['id']);
        $enum_list = $this->userService->getAllRole();
        if (isset($_POST['save'])) {
            $result = $this->userService ->editUser($_GET['id'], $_POST['username'], $_POST['password'], $_POST['role']);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=user&action=list');
            }
        }

        include("views/user/edit_user.php");
    }

    public function add()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        $this->userService = new UserService();
        $enum_list = $this->userService->getAllRole();
        if (isset($_POST['submit'])) {
            $result = $this->userService->addUser($_POST['username'], $_POST['password'], $_POST['role']);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=user&action=list');
            }
        }
        include("views/user/add_user.php");
    }

    public function delete(){
        $this->userService = new UserService();
        if (isset($_GET['id'])){
            $result = $this->userService->deleteUser($_GET['id']);
            if($result){
                header('location:/CSE485_2023_BTTH02/index.php?controller=user&action=list');
            }
        }
        include("views/user/list_user.php");
    }


}