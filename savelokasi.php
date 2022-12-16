<?php
    include 'connect.php';

    $id_lokasi = $_POST['id_lokasi'];
    $alamat = $_POST['alamat'];

    if (empty($id_lokasi)) {
        $sql = 'INSERT INTO lokasi VALUE ("", "'.$alamat.'")';
    } else {
        $sql = 'UPDATE lokasi SET alamat="'.$alamat.'" WHERE id_lokasi="'.$id_lokasi.'"';
    }


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Inserted Failed.';
    }
?>