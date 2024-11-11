<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
// Include các file cần thiết
require_once 'config/db.php'; // kết nối với DB
require_once 'models/ProductModel.php';
require_once 'models/UserModel.php';
require_once 'models/CategoryModel.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/CategoryController.php';

// Khởi tạo đối tượng database
$db = new Database();
$connection = $db->getConnection();

// Xác định hành động từ URL (GET)
$action = isset($_GET['action']) ? $_GET['action'] : 'listProducts';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Điều hướng hành động
switch ($action) {
    // Các hành động cho sản phẩm
    case 'list':
        $controller = new ProductController($connection);
        $controller->listProducts();
        break;
    case 'add':
        $controller = new ProductController($connection);
        $controller->addProduct();
        break;
    case 'edit':
        if ($id) {
            $controller = new ProductController($connection);
            $controller->editProduct($id);
        }
        break;
    case 'delete':
        if ($id) {
            $controller = new ProductController($connection);
            $controller->deleteProduct($id);
        }
        break;

    // Các hành động cho người dùng
    case 'listUsers':
        $controller = new UserController($connection);
        $controller->listUsers();
        break;
    case 'addUser':
        $controller = new UserController($connection);
        $controller->addUser();
        break;
    case 'editUser':
        if ($id) {
            $controller = new UserController($connection);
            $controller->editUser($id);
        }
        break;
    case 'deleteUser':
        if ($id) {
            $controller = new UserController($connection);
            $controller->deleteUser($id);
        }
        break;

    // Các hành động cho danh mục
    case 'listCategories':
        $controller = new CategoryController($connection);
        $controller->listCategories();
        break;
    case 'addCategory':
        $controller = new CategoryController($connection);
        $controller->addCategory();
        break;
    case 'editCategory':
        if ($id) {
            $controller = new CategoryController($connection);
            $controller->editCategory($id);
        }
        break;
    case 'deleteCategory':
        if ($id) {
            $controller = new CategoryController($connection);
            $controller->deleteCategory($id);
        }
        break;

    // Mặc định nếu không có hành động nào phù hợp
    default:
        $controller = new ProductController($connection);
        $controller->listProducts();
        break;
}
?>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>