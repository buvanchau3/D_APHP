<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <style>
     .category-card {
    overflow: hidden; /* Đảm bảo phần tử con không bị tràn ra ngoài */
  }

  .category-image {
    transition: transform 0.3s ease-in-out; /* Tạo hiệu ứng chuyển động mượt */
  }

  .category-card:hover .category-image {
    transform: scale(1.1); /* Tăng kích thước ảnh khi hover */
  }

  .category-label {
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.5);
    padding: 5px 10px;
  }
   </style> 
</head>
  <body>
  <div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <a href="#" class="text-decoration-none">
        <div class="position-relative text-center category-card">
          <img src="../assets/img/đồ-nữ-1.png" alt="Danh mục nữ" class="img-fluid rounded category-image">
          <div class="position-absolute category-label">
            <span class="text-white font-weight-bold">NỮ</span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="#" class="text-decoration-none">
        <div class="position-relative text-center category-card">
          <img src="../assets/img/đồ-nam-1.png" alt="Danh mục nam" class="img-fluid rounded category-image">
          <div class="position-absolute category-label">
            <span class="text-white font-weight-bold">NAM</span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="#" class="text-decoration-none">
        <div class="position-relative text-center category-card">
          <img src="../assets/img/bé-gái-2.png" alt="Danh mục bé gái" class="img-fluid rounded category-image">
          <div class="position-absolute category-label">
            <span class="text-white font-weight-bold">BÉ GÁI</span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="#" class="text-decoration-none">
        <div class="position-relative text-center category-card">
          <img src="../assets/img/bé-trai-2.png" alt="Danh mục bé trai" class="img-fluid rounded category-image">
          <div class="position-absolute category-label">
            <span class="text-white font-weight-bold">BÉ TRAI</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>