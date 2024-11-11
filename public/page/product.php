<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            border-radius: 8px;
            background-color: white;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .quick-add,
        .buy-now {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            display: none;
            text-decoration: none;
        }

        .product-card:hover .quick-add,
        .product-card:hover .buy-now {
            display: block;
        }

        .quick-add {
            bottom: 40px;
        }

        .favorite-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border: none;
            border-radius: 50%;
            padding: 8px;
            transition: background-color 0.3s ease;
        }

        .favorite-button:hover {
            background: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center mb-4">SẢN PHẨM</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="product-card position-relative shadow-sm" data-product-id="1" style="padding: 0px !important">
                    <div class="position-relative">
                        <a href="details.php">
                            <img src="../assets/img/đồ-nữ-1.png" alt="Sản phẩm" class="img-fluid">
                        </a>
                        <button class="favorite-button">
                            <svg class="w-5 h-5 text-danger" fill="currentColor" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </button>
                        <a href="#" class="quick-add text-center" onclick="addToCart(1)">Thêm vào giỏ</a>
                        <a href="details.php" class="buy-now text-center">Mua Ngay</a>
                    </div>
                    <div class="mt-3 p-2">
                        <h3 class="h5 text-dark">Bộ pyjama nữ cotton</h3>
                        <p class="text-muted">Áo cộc tay quần soóc</p>
                        <div class="d-flex align-items-center">
                            <span class="text-danger font-weight-bold mr-2">329.000đ</span>
                            <small class="text-muted"><s>499.000đ</s></small>
                            <span class="ml-2 badge badge-danger">-34%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Thêm các Product Card khác -->
        </div>
    </div>

    <script>
        function addToCart(productId) {
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productId: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sản phẩm đã được thêm vào giỏ hàng!');
                } else {
                    alert('Có lỗi xảy ra!');
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>