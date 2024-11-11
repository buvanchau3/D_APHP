<?php
require_once 'models/CategoryModel.php';

class CategoryController {
    private $model;

    public function __construct($db) {
        $this->model = new CategoryModel($db);
    }

    public function listCategories() {
        $categories = $this->model->getAllCategories();
        include 'views/category_list.php';
    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->model->addCategory($name);
            header("Location: index.php?action=listCategories");
        } else {
            include 'views/category_add.php';
        }
    }

    public function editCategory($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->model->updateCategory($id, $name);
            header("Location: index.php?action=listCategories");
        } else {
            $category = $this->model->getCategoryById($id);
            include 'views/category_edit.php';
        }
    }

    public function deleteCategory($id) {
        $this->model->deleteCategory($id);
        header("Location: index.php?action=listCategories");
    }
}
?>
