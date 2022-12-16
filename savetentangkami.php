<?php
    include 'connect.php';

    $id = $_POST['id'];
    $isi = $_POST['isi'];

    if (empty($id)) {
        $sql = 'INSERT INTO tentangkami VALUE ("", "'.$isi.'")';
    } else {
        $sql = 'UPDATE tentangkami SET isi="'.$isi.'" WHERE id="'.$id.'"';
    }


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Inserted Failed.';
    }
?>