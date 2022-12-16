<?php
    include 'connect.php';

    $id_sampah = $_GET['id_sampah'];

    $sql = 'DELETE FROM t_sampah WHERE id_sampah = "'.$id_sampah.'"';

    $result = mysqli_query($conn, $sql);

    if($result) {
        header('Location: index.php');
    } else {
        echo 'Deleted Failed;';
    }
    
?>