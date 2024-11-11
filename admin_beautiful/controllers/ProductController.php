<?php

require_once 'config/db.php';
require_once 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct() {
        // Khởi tạo đối tượng ProductModel mà không cần truyền kết nối
        $this->model = new ProductModel();
    }

    // Danh sách tất cả sản phẩm
    public function listProducts() {
        $products = $this->model->getAllProducts();
        include 'views/product_list.php';
    }
// Phương thức thêm sản phẩm
public function addProduct() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image_path = $_FILES['image']['name'];  // Sử dụng image_path thay vì image
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category_id'];

        // Upload ảnh
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = 'img/';
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image_path);  // Di chuyển ảnh vào thư mục img
        } else {
            $image_path = 'default.jpg'; // Nếu không có ảnh, gán ảnh mặc định
        }

        // Gọi phương thức thêm sản phẩm
        if ($this->model->addProduct($name, $price, $description, $image_path, $quantity, $category_id)) {
            echo "Sản phẩm đã được thêm thành công!";
        } else {
            echo "Thêm sản phẩm thất bại!";
        }
        header("Location: index.php?action=list");
        exit();
    } else {
        // Lấy danh sách danh mục sản phẩm để hiển thị trong form
        $categories = $this->model->getCategories();
        include 'views/product_add.php';
    }
}

// Cập nhật sản phẩm
public function updateProduct($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $image_path = $_FILES['image']['name'];  // Sử dụng image_path
        $price = $_POST['price'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];  // Thêm trường quantity
        $category_id = $_POST['category_id'];  // Thêm trường category_id

        // Kiểm tra nếu có thay đổi ảnh
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_path = $_FILES['image']['name'];  // Lấy tên ảnh mới nếu có upload
            $upload_dir = 'img/';
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image_path);  // Di chuyển ảnh mới vào thư mục
        }

        // Gọi phương thức cập nhật sản phẩm
        $this->model->updateProduct($id, $name, $price, $description, $image_path, $quantity, $category_id);
        header("Location: index.php?action=list");
        exit();
    } else {
        // Lấy thông tin sản phẩm để điền vào form sửa
        $product = $this->model->getProductById($id);
        $categories = $this->model->getCategories();  // Lấy danh mục
        include 'views/product_edit.php';
    }
}


    // Xóa sản phẩm
    public function deleteProduct($id) {
        $this->model->deleteProduct($id);
        header("Location: index.php?action=list");
    }
}
?>
