<?php
// Create database connection using config file
include_once("koneksi.php");
// Fetch all users data from database
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <table width='80%' border=1 class="mt-5 ml-5">
        <tr>
        <th>Nim</th> <th>Nama</th> <th>Gender</th> <th>Alamat</th>
        <th>tgl lahir</th> <th>Update</th>
        </tr>
        <?php
        while($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$user_data['nim']."</td>";
            echo "<td>".$user_data['nama']."</td>";
            echo "<td>".$user_data['jkel']."</td>";
            echo "<td>".$user_data['alamat']."</td>";
            echo "<td>".$user_data['tgllhr']."</td>";
            echo "<td><a class='btn btn-primary' href='edit.php?nim=$user_data[nim]'>Edit</a> | <a class='btn btn-danger' href='delete.php?nim=$user_data[nim]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <a class="btn btn-primary mt-4 ml-5" href="tambah.php" role="button">Tambah Data Baru</a><br/><br/>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>