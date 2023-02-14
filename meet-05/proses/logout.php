<?php
session_start();
session_destroy();
echo "Anda telah sukses keluar sistem <b>LOGOUT</b>";
echo "<br>Silahkan login : <a href='../form_login.php'>LOGIN</a>";
