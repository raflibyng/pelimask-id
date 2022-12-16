<?php
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM t_admin where username ="'.$username.'" AND password ="'.$password.'"';

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query)) {
        $row = mysqli_fetch_object($query);

        $_SESSION['username'] = $row->username;
    
    header('Location:index.php');
    } else {
        echo('Username atau Password salah!');
        header('Location:formlogin.php');
























        
    }

?>