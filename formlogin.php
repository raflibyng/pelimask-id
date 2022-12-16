<?php include 'connect.php'; ?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOGIN | Pelimask.id</title>
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
        <h1 class="mt-3 mb-3"> </h1>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="fs-3 fw-bold" style="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label class="fs-3 fw-bold">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Masuk" class="btn btn-success">
                <a  href= "index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>



  </body>
</html>