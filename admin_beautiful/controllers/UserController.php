<?php
require_once 'models/UserModel.php';

class UserController {
    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function listUsers() {
        $users = $this->model->getAllUsers();
        include 'views/user_list.php';
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->model->addUser($username, $email, $password);
            header("Location: index.php?action=listUsers");
        } else {
            include 'views/user_add.php';
        }
    }

    public function editUser($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $this->model->updateUser($id, $username, $email);
            header("Location: index.php?action=listUsers");
        } else {
            $user = $this->model->getUserById($id);
            include 'views/user_edit.php';
        }
    }

    public function deleteUser($id) {
        $this->model->deleteUser($id);
        header("Location: index.php?action=listUsers");
    }
}
?>
