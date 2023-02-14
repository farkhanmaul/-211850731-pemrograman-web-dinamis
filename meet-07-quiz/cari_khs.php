<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Syntax untuk mengambil semua data dari table mahasiswa
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>

<head>
    <title>Halaman Utama</title>
</head>

<body>
    <a href="index.php">Kembali Ke Menu Utama</a>
    <form action="" method="GET" style="margin-top: 1em">
        <input style="padding:1em 2em; width:80%;" type="text" name="cari_nim" placeholder="Cari Data Berdasarkan NIM">
    </form>

    <?php if (isset($_GET['cari_nim'])) : ?>

        <?php
        $cari_nim = $_GET['cari_nim'];
        $result = mysqli_query($con, "SELECT  mata_kuliah.kode, mata_kuliah.nama as nama_matkul, mata_kuliah.sks, mata_kuliah.sem, khs.nilai FROM khs, mahasiswa, mata_kuliah WHERE mahasiswa.nim = '$cari_nim' and mata_kuliah.id = khs.id_matkul and mahasiswa.id = khs.id_mhs");
        $result2 = mysqli_query($con, "SELECT  * FROM mahasiswa WHERE nim = '$cari_nim' LIMIT 1");
        ?>

        <?php if ($result->num_rows > 0) : ?>
            <?php
            while ($user_data = mysqli_fetch_array($result2)) {
                echo "<h3>NIM : " . $user_data['nim'] . "</h3>";
                echo "<h3>Nama : " . $user_data['nama'] . "</h3>";
            }
            ?>
            <table width='80%' border=1>
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
                <?php

                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['kode'] . "</td>";
                    echo "<td>" . $user_data['nama_matkul'] . "</td>";
                    echo "<td>" . $user_data['sks'] . "</td>";
                    echo "<td>" . $user_data['sem'] . "</td>";
                    echo "<td>" . $user_data['nilai'] . "</td>";
                }
                ?>
            </table>
        <?php else : ?>
            <h3>NIM : Tidak ditemukan!</h3>
            <h3>Nama : Tidak ditemukan!</h3>
            <table width='80%' border=1>
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
                <tr>
                    <td colspan="7" align="center">Data tidak di temukan!</td>
                </tr>
            </table>
        <?php endif; ?>


    <?php endif; ?>
</body>

</html>