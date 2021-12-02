<?php
// Digunakan untuk mengisi nama host SQL
$host = "localhost";

// Variable untuk menampung username pada SQL
$username = "root";

// Variable untuk menampung password SQL
$password = "";

// Variable untuk mengisi database yang akan dipakai
$databasename = "akademik_postest2";

// Kode dibawah digunakan untuk menguhubungkan ke SQL
$con = @mysqli_connect($host, $username, $password, $databasename);

if (!$con) {
    // Kondisi jika parameter di atas tidak terpenuhi
    echo "Error: " . mysqli_connect_error();
    exit();
}