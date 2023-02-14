<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="proses/cek_login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td> : <input name='username' type='text'></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> : <input name='password' type='password'></td>
            </tr>
            <tr>
                <td colspan=2><input type='submit' value='LOGIN'></td>
            </tr>
        </table>
    </form>
</body>

</html>