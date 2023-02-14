<?php
include "koneksi.php";
$sql = "SELECT * FROM user ORDER BY username";
$tampil = mysqli_query($con, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {
    echo "AKSES DI TOLAK!";
    echo "<br><a href='form_login.php'>LOGIN</a>";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <h2>User</h2>
    <?php if ($_SESSION['level'] == "ADMIN") : ?>
        <a href="form_user.php">Tambah User</a><br>
    <?php endif; ?>
    <a href="proses/logout.php">Logout</a>

    <table border="1" width="80%" style="margin:0 auto; margin-top: 1em; ">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <?php if ($_SESSION['level'] == "ADMIN") : ?>
                    <th>Level</th>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <?php if (mysqli_num_rows($tampil) > 0) : ?>
            <?php $no = 1; ?>
            <?php while ($r = mysqli_fetch_array($tampil)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r['username'] ?></td>
                    <?php if ($_SESSION['level'] == "ADMIN") : ?>
                        <td><?= $r['level'] ?></td>
                        <td>
                            <a href='proses/hapus_user.php?id=<?= $r['id'] ?>'>Hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" align="center">Data tidak ada!</td>
            </tr>
        <?php endif; ?>

        <tbody>

        </tbody>
    </table>
</body>

</html>