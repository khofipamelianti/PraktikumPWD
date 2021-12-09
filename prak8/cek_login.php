<?php
// Menghubungkan file dengan koneksi.php
include "koneksi.php";

// deklarasi variable untuk menampung data input
$id_user = $_POST['id_user'];
$pass = md5($_POST['paswd']);

// Memulai session
session_start();
// memilih atau cek data pada database sesuai dengan id dan pass yang di inoutkan pada form
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
$login = mysqli_query($con, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Cek kondisi jika kode captcha yang diinput sama dengan captcha pada session
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {

    // kondisi jika data ditemukan, data input sesuai dengan data yang ada di database
    if ($ketemu > 0) {

        $log = "UPDATE users SET log=NOW() WHERE id_user = '$r[id_user]'";
        $update = mysqli_query($con, $log);

        if (!empty($update)) {
            //membuat variabel session iduser
            $_SESSION['iduser'] = $r['id_user'];

            //membuat variabel session iduser
            $_SESSION['passuser'] = $r['password'];

            echo "USER BERHASIL LOGIN<br>";

            // output yang digunakan untuk menampilkan session
            echo "id user =", $_SESSION['iduser'], "<br>";

            // output yang digunakan untuk menampilkan session
            echo "password=", $_SESSION['passuser'], "<br>";

            echo "<a href=logout.php><b>LOGOUT</b></a></center>";
        }
    }
    // kondisi jika inputan salah atau tidak sesuai
    else {

        echo "<center>Login gagal! username & password tidak benar<br>";

        echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
    }
    mysqli_close($con);
}
