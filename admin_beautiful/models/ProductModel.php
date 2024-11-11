<?php 
session_start();
// Sử dụng kết nối từ db.php
    require_once 'config/db.php';

     class ProductModel {
    private $conn;

    public function __construct() {
        // Khởi tạo đối tượng Database và lấy kết nối
        $database = new Database();
        $this->conn = $database->conn;
    }

// Lấy tất cả sản phẩm
public function getAllProducts() {
    $sql = "SELECT p.product_id, p.name, p.price, p.description, p.image_path, p.quantity, p.category_id, c.name AS category_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id"; // Chỉnh sửa theo tên cột category_id của bạn
    return $this->conn->query($sql);
}


// Lấy sản phẩm theo ID
public function getProductById($id) {
    $sql = "SELECT p.product_id, p.name, p.price, p.description, p.image_path, p.quantity, p.category_id, c.name AS category_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id 
            WHERE p.product_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}





 // Phương thức thêm sản phẩm mới vào cơ sở dữ liệu
 public function addProduct($name, $price, $description, $image_path, $quantity, $category_id) {
    $sql = "INSERT INTO products (name, price, description, image_path, quantity, category_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    
    // Liên kết các tham số với các kiểu dữ liệu phù hợp
    $stmt->bind_param("sssdii", $name, $description, $image_path, $price, $quantity, $category_id);
    
    // Thực thi câu lệnh SQL
    return $stmt->execute();
}


    // Cập nhật sản phẩm
    public function updateProduct($id, $name, $price, $description, $image_path, $quantity, $category_id) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, image = ?, quantity = ?, category_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdssiii", $name, $price, $description, $image_path, $quantity, $category_id, $id);
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function getCategories() {
        $sql = "SELECT * FROM categories";  // Truy vấn lấy tất cả các danh mục
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $categories = [];
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
           
            return $categories;
        } else {
            return [];
        }
    }
    
    

  } 
  
?>


