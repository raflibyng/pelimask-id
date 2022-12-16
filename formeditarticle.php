<?php include 'connect.php'; 

    if(isset($_GET['id_artikel'])) {
        $id_artikel = $_GET['id_artikel'];
        $query = "SELECT * FROM t_artikel WHERE id_artikel = '$id_artikel'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }

        $data = mysqli_fetch_assoc($result);

        if(!count($data)) {
            echo "<script>alert('Data tidak ditambahkan pada tabel');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Masukkan ID_ARTIKEL yang ingin di edit!');window.location='index.php';</script>";
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Data Artikel</title>
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
  
  <form action="saveeditarticle.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 container">
        <label class="fs-3 fw-bold">Judul <?php echo $data['judul'];?></label>
        <input type="text" class="form-control" name="judul" autofocus="" required="" value="<?php echo $data['judul']; ?>" />
        <br>
        <input type="hidden" class="form-control" name="id_artikel" value="<?php echo $data['id_artikel']; ?>" />
    </div>

    <div class="mb-3 container">
        <label class="fs-3 fw-bold">Gambar</label>
        <br>
        <img src="assets/img/gambar-artikel/<?php echo $data['gambar']; ?>" style="width: 150px; float: left; margin-bottom: 5px">
        <br>
        <img src="assets/img/80x80.png" id="preview" class="img-thumbnail">
        <br>
        <input type="file" name="gambar" />
        <br>
        <i style="float: left; font-size: 11px; color: red;">Harus Diisi sesuai dengan judul Artikel. Jika sama masukkan ulang gambar</i>
    </div>
    <br>
    <div class="mb-3 container">
        <button type="submit" value="Submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</body>