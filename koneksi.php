<?php
//error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$database = "perpus";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (mysqli_connect_errno()) {
    die("Gagal untuk mengkoneksi database: " . mysqli_connect_error());
}
