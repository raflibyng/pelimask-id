<?php include 'connect.php'; ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah | Ubah | Hapus Data Sampah</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pelimaskicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
  <nav class="bg-secondary text-uppercase" id="mainNav">
    <div class="container">
        <img src="assets/img/logonav.png" class="img-fluid" alt="...">
        <a class="navbar-brand" href="index.php" >PELIMASK.ID</a>
    </div>
  </nav>

  <form action="savearticle.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 container">
        <label class="fs-3 fw-bold">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Artikel" required="">
    </div>

    <div class="mb-3 container">
        <label class="fs-3 fw-bold">Gambar</label>
        <br>
        <img src="assets/img/80x80.png" id="preview" class="img-thumbnail">
        <input type="file" name="gambar" required="">
    </div>

    <div class="mb-3 container">
        <button type="submit" value="Submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</body>