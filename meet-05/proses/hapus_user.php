<?php
include "../koneksi.php";
$sql = "delete from user where id = '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($con);

header('Location: ../index.php');
