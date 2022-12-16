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
  <?php 

    $act = 'add';
            
    if(! empty($_GET['id_sampah'])) {
        $sql = 'SELECT * FROM t_sampah WHERE id_sampah="'.$_GET['id_sampah'].'"';
        
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
  ?>

 <form action="savechart.php" method="POST">
    <div class="mb-3 container">
      <label class="fs-3 fw-bold">Minggu ke</label>
      <input type="text" class="form-control" name="minggu_ke" placeholder="Masukkan Angka Minggu, Contoh: 1" value="<?php if ($act == 'edit') echo $row->minggu_ke; ?>" required>
    </div>
    <div class="mb-3 container">
      <label class="fs-3 fw-bold">Jumlah Masker</label>
      <input type="text" class="form-control" name="jumlah_masker" placeholder="Jumlah Limbah Masker per-Minggu" value="<?php if ($act == 'edit') echo $row->jumlah_masker; ?>" required>
      <input type="hidden" name="id_sampah" value="<?php if ($act == 'edit') echo $row->id_sampah; ?>">
    </div>
    <div class="mb-3 container">
      <button type="submit" value="Submit" class="btn btn-success">Submit</button>
      <a  href= "index.php" class="btn btn-danger">Cancel</a>
    </div>
 </form>






</body>
</html>

