<?php
include "../koneksi.php";
$username = $_POST['username'];
$level = $_POST['level'];
$password = md5($_POST['password']);

$sql = "INSERT INTO user (username, password, level) VALUES ('$username', '$password', '$level')";
$query = mysqli_query($con, $sql);
mysqli_close($con);

header("Location: ../index.php");
