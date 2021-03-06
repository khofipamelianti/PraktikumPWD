<?php

// Membuat table untuk menampilkan data
echo "<h2>User</h2>
    <form method=POST action=form_user.php>
        <input type=submit value='Tambah User'>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>NamaLengkap</th>
            <th>Email</th>
            <th>Log</th>
            <th>Aksi</th>
        </tr>";

// Menghubungkan file dengan koneksi.php
include "koneksi.php";

// Memilih seluruh data pada database sesuai dengan id yang dipilih
$sql = "SELECT * FROM users ORDER BY id_user";
$tampil = mysqli_query($con, $sql);

// percabangan untuk menampilkan semua data yang ada di dalam database
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) {
        echo "<tr>
                <td>$no</td>
                <td>$r[id_user]</td>
                <td>$r[nama_lengkap]</td>
                <td>$r[email]</td>
                <td>$r[log]</td>
                <td><a href='hapus_user.php?id=$r[id_user]'>Hapus</a></td>
            </tr>";
        $no++;
    }
    echo "</table>";

    // kondisi jika didalam database tidak ada data
} else {
    echo "0 results";
}
mysqli_close($con);
