<?php include 'connect.php'; ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah | Ubah | Hapus Alamat</title>
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
  <?php 

    $act = 'add';
            
    if(! empty($_GET['id_lokasi'])) {
        $sql = 'SELECT * FROM lokasi WHERE id_lokasi="'.$_GET['id_lokasi'].'"';
        
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
    ?>

 <form action="savelokasi.php" method="POST">
    <div class="mb-3 container">
        <label class="fs-3 fw-bold">Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat | Kosongkan untuk menghapus" value="<?php if ($act == 'edit') echo $row->alamat; ?>">
        <label class="fs-3 fw-bold">Id Informasi</label>
        <input type="text" class="form-control" name="id_lokasi" placeholder="Ketik Angka '1'"value="<?php if ($act == 'edit') echo $row->id_lokasi; ?>">
    </div>
    <div class="mb-3 container">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a  href= "index.php" class="btn btn-danger">Cancel</a>
       
    </div>
 </form>






</body>
</html>

