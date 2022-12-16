<?php
    session_start();
    
    $hostname = 'localhost'; //127.0.0.1
    $username = 'root';
    $password = '';
    $dbname = 'db_pelimask';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Connection Failed.');
?>