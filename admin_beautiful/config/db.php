<?php
// config/db.php
class Database {
    private $host = "localhost";   // Địa chỉ máy chủ cơ sở dữ liệu
    private $username = "root";    // Tên người dùng cơ sở dữ liệu
    private $password = "";        // Mật khẩu cơ sở dữ liệu
    private $dbname = "d_a_beautiful";  // Tên cơ sở dữ liệu

    public $conn;

    public function __construct() {
        $this->conn = null;

        try {
            // Tạo kết nối với MySQL bằng mysqli
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            // Kiểm tra kết nối
            if ($this->conn->connect_error) {
                die("Kết nối thất bại: " . $this->conn->connect_error);
            }else{
                // echo "Kết nối thành công";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
     // Thêm phương thức getConnection() để trả về đối tượng kết nối
     public function getConnection() {
        return $this->conn;
    }
}
?>
