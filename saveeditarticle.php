<?php 

    include "connect.php";

    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $gambar = $_FILES['gambar']['name'];

    if($gambar != ""){
       $ekstensi_diperbolehkan = array('png', 'jpg');
       $x = explode('.', $gambar);
       $ekstensi = strtolower(end($x));
       $file_tmp = $_FILES['gambar']['tmp_name'];
       $angka_acak = rand(1, 999);
       $nama_gambar_baru = $angka_acak.'-'.$gambar;

       if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'assets/img/gambar-artikel/'.$nama_gambar_baru);

        $query = "UPDATE t_artikel SET judul = '$judul', gambar = '$nama_gambar_baru'";

        $query .= "WHERE id_artikel = '$id_artikel'";

        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
        }

       } else {
        echo "<csript>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='formeditarticle.php';</script>";
       }
    } else {
        $query = "UPDATE t_artikel SET judul = '$judul'";

        $query = "WHERE id_artikel = '$id_artikel'";

        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
        }
    }
?>