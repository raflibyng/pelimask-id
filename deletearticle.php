<?php
    include 'connect.php';

    $id_artikel = $_GET['id_artikel'];

    $query = "DELETE FROM t_artikel WHERE id_artikel = '$id_artikel'";

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
    }
?>