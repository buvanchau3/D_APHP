<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="card-body">
           <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
            <?php
              // Duyệt qua các sản phẩm và hiển thị thông tin
                    foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td>{$product['name']}</td>";
                        // Cập nhật lại phần hiển thị ảnh
                        echo "<td>
                        <img src='img/{$product['image_path']}' ' width='70'>
                            {$product['image_path']}
                        </td>";
                        echo "<td>{$product['price']}</td>";
                        echo "<td>{$product['quantity']}</td>";
                        echo "<td>{$product['description']}</td>";
                        echo "<td>{$product['category_name']}</td>";  // Hiển thị tên danh mục thay vì ID
                        echo "<td>
                                <a class='btn btn-success' href='index.php?action=edit&id={$product['product_id']}'>Sửa</a> 
                            </td>";
                        echo "<td>
                             <a class='btn btn-danger' href='index.php?action=delete&id={$product['product_id']}'>Xóa</a>
                             </td>"  ;  
                        echo "</tr>";
                    }

                ?>
                
            </tbody>
           </table>
           <a class="btn btn-primary" href="index.php?action=add">Thêm sản phẩm mới</a>
        </div>
    </div>
</div>
