<?php
    include 'connect.php';

    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($id_admin)) {
        $sql = 'INSERT INTO t_admin VALUE ("", "'.$username.'", "'.$password.'")';
    } else {
        $sql = 'UPDATE t_admin SET username="'.$username.'", password="'.$password.'" WHERE id_admin="'.$id_admin.'"';
    }

    

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Inserted Failed.';
    }
?>