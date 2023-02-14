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
        <input style="padding:1em 2em; width:80%;" type="text" name="cari_nama" placeholder="Cari Data Berdasarkan Nama">
    </form>

    <?php if (isset($_GET['cari_nama'])) : ?>

        <?php
        $cari_nama = $_GET['cari_nama'];
        $result = mysqli_query($con, "SELECT mahasiswa.nim, mata_kuliah.kode, khs.nilai FROM khs, mahasiswa, mata_kuliah WHERE mahasiswa.nama like '%$cari_nama%' and mata_kuliah.id = khs.id_matkul and mahasiswa.id = khs.id_mhs");
        ?>

        <?php if ($result->num_rows > 0) : ?>
            <table width='80%' border=1>
                <tr>
                    <th>NIM</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nilai</th>
                </tr>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['nim'] . "</td>";
                    echo "<td>" . $user_data['kode'] . "</td>";
                    echo "<td>" . $user_data['nilai'] . "</td>";
                }
                ?>
            </table>
        <?php else : ?>
            <table width='80%' border=1>
                <tr>
                    <th>NIM</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nilai</th>
                </tr>
                <tr>
                    <td colspan="3" align="center">Data tidak di temukan!</td>
                </tr>
            </table>
        <?php endif; ?>


    <?php endif; ?>
</body>

</html>