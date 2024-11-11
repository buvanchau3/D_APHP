<?php

require_once 'config/db.php';  // Kết nối cơ sở dữ liệu
require_once 'models/ProductModel.php';  // Kết nối với lớp ProductModel

// Xử lý khi người dùng gửi form (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];

    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'img/';
        // Tạo tên file duy nhất để tránh trùng lặp
        $image_path = time() . '_' . basename($_FILES['image']['name']);
        $upload_file = $upload_dir . $image_path;
    
        // Di chuyển file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
            // Thành công
        } else {
            // Thất bại, xử lý lỗi
            echo "Lỗi khi upload ảnh.";
            exit();
        }
    } else {
        $image_path = 'default.jpg';
    }

    // Tạo đối tượng ProductModel và gọi phương thức addProduct
    $productModel = new ProductModel();
    $productModel->addProduct($name, $price, $description, $image_path, $quantity, $category_id);

    // Sau khi thêm sản phẩm thành công, chuyển hướng về trang danh sách sản phẩm
    header('Location: index.php?action=product_list'); 
    exit();
}
?>

<!-- Form HTML để thêm sản phẩm -->
<div class="container">
  <h1>Thêm sản phẩm mới</h1>

  <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="name">Tên sản phẩm:</label>
          <input class="form-control" type="text" name="name" required>
      </div>

      <div class="form-group">
          <label for="image">Hình ảnh:</label>
          <input type="file" name="image" accept="img/" required>
      </div>
      <div class="form-group">
          <label for="price">Giá:</label>
          <input class="form-control" type="number" name="price" step="0.01" required>
      </div>
      
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input class="form-control" type="number" name="quantity" required>
            </div>

      <div class="form-group">
          <label for="description">Mô tả:</label>
          <textarea class="form-control" name="description" required></textarea>
      </div>


      <div class="form-group">
          <label for="category_id">Danh mục:</label>
          <select class="form-control" name="category_id" required>
              <?php
              // Kiểm tra và hiển thị danh mục
              $productModel = new ProductModel();
              $categories = $productModel->getCategories();
              foreach ($categories as $category) {
                  echo "<option value='{$category['category_id']}'>{$category['name']}</option>";
              }
              ?>
          </select>
      </div>

      <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
  </form>
</div>
