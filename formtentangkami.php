<?php 
    

    $act = 'add';
    
    if(! empty($_GET['id'])) {
        $sql = 'SELECT * FROM tentangkami WHERE id="'.$_GET['id'].'"';
        
        $query = mysqli_query($conn, $sql);
   
        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Tentang Kami</title>
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
    <div class="container">
        <h1 class="mt-3 mb-3">Tambah Tentang Kami</h1>
        <form action="savetk.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Tentang Kami</label>
                <input type="text" class="form-control" name="isi" placeholder="Tambahkan Tentang Kami disini" value="<?php if ($act == 'edit') echo $row->isi; ?>"
                    required>
                <input type="hidden" name="id" value="<?php if ($act == 'edit') echo $row->id; ?>">
            </div>

            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-sm btn-success">
                <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </form>
    </div>
</body>
