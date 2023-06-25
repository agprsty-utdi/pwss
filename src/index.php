<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Projek Besar</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card {
      background-color: #f8f9fa;
      transition: transform 0.3s;
    }

    .card-title, .card-text {
      color: #333;
    }

    .card:hover {
      color: #007bff;
      transform: scale(1.05);
      background-color: #e9ecef;
    }
    .card-link {
      text-decoration: none;
    }

    .img-schema {
      display: block;
      margin: auto;
      max-width: 100%;
      height: auto;
    }
    
    .container-img {
      text-align: center;
      margin-top: 30px;
    }

    .footer {
      padding: 10px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center mt-5">Tugas PWSS K1 - CRUD Aplikasi Penjualan</h2>
    <h4 class="text-center mt-3">Mau pergi ke laman apa?</h4>

    <div class="card-deck mt-3">
      <div class="card">
        <a href="/costumer" class="card-body card-link">
          <h5 class="card-title">Costumer</h5>
          <p class="card-text">Halaman untuk mengelola data konsumen.</p>
        </a>
      </div>
      <div class="card">
        <a href="/product" class="card-body card-link">
          <h5 class="card-title">Product</h5>
          <p class="card-text">Halaman untuk mengelola data produk.</p>
        </a>
      </div>
      <div class="card">
        <a href="/order" class="card-body card-link">
          <h5 class="card-title">Order</h5>
          <p class="card-text">Halaman untuk mengelola data order.</p>
        </a>
      </div>
    </div>

    <br>
    <h4 class="text-center mt-3">Schema Database Aplikasi:</h4>
    <div class="container-img">
      <img class="img-schema" src="public/img/schema.png" alt="Schema Database Aplikasi">
    </div>
    
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Dibuat oleh <a href="https://github.com/agungprsty">Agung Prasetyo</a> (215411097)</p>
        <p class="text-muted">Universitas Teknologi Digital Indonesia &copy; 2023</p>
      </div>
    </footer>
  </div>
</body>

</html>
