<?php
    include 'connect.php';

    $id_sampah = $_POST['id_sampah'];
    $minggu_ke = $_POST['minggu_ke'];
    $jumlah_masker = $_POST['jumlah_masker'];


    if (empty($id_sampah)) {
        $sql = 'INSERT INTO t_sampah VALUE ("", "'.$minggu_ke.'", "'.$jumlah_masker.'")';
    } else {
        $sql = 'UPDATE t_sampah SET minggu_ke="'.$minggu_ke.'", jumlah_masker="'.$jumlah_masker.'" WHERE id_sampah="'.$id_sampah.'"';
    }


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Inserted Failed.';
    }
?>