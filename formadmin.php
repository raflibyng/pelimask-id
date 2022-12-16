<?php 

    $act = 'add';
    
    if(! empty($_GET['id_admin'])) {
        $sql = 'SELECT * FROM t_admin WHERE id_admin="'.$_GET['id_admin'].'"';
        
        $query = mysqli_query($conn, $sql);
   
        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
?>

<head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DAFTAR ADMIN | Pelimask.id</title>
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
    <div class="container">
        <h1 class="mt-3 mb-3">DAFTAR ADMIN</h1>
        <form action="saveadmin.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if ($act == 'edit') echo $row->username; ?>"
                    required>
                <input type="hidden" name="id_admin" value="<?php if ($act == 'edit') echo $row->id_admin; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password" value="<?php if ($act == 'edit') echo $row->password; ?>"
                    required>
                <input type="hidden" name="id_admin" value="<?php if ($act == 'edit') echo $row->id_admin; ?>">
            </div>
          
            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-sm btn-success">
            </div>

        </form>
    </div>