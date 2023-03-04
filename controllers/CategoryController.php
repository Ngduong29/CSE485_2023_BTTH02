<?php
require_once 'services/CategoryService.php';
class CategoryController
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
        $this->categoryService = new CategoryService();
        $findCategory = $this->categoryService->findCategoryById($_GET['id']);
        if (isset($_POST['save'])) {
            $result = $this->categoryService->editCategory($_GET['id'], $_POST['ten_tloai']);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=category&action=list');
            }
        }

        include("views/category/edit_category.php");
    }

    public function add()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        $this->categoryService = new CategoryService();
        if (isset($_POST['submit'])) {
            $result = $this->categoryService->addCategory($_POST['ten_tloai']);
            if ($result) {
                header('location:/CSE485_2023_BTTH02/index.php?controller=category&action=list');
            }
        }
        include("views/category/add_category.php");
    }

    public function delete(){
        $this->categoryService = new CategoryService();
        if (isset($_GET['id'])){
            $result = $this->categoryService->deleteCategory($_GET['id']);
            if($result){
                header('location:/CSE485_2023_BTTH02/index.php?controller=category&action=list');
            }
        }
        include("views/category/list_category.php");
    }

    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        $categoryService = new CategoryService();
        $categorys = $categoryService->getAllCategorys();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
    }
}
?>