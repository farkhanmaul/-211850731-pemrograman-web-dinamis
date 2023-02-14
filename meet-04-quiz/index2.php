<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>PWD Pert 4</title>
</head>

<body>
    <?php
    // Mendeklarasikan variabel dan meng-set data kosong ke variable tersebut
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $namaSuc = $emailSuc = $genderSuc = $websiteSuc = "";
    $nama = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        } else {
            $namaSuc = "VALID";
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
        } else {
            $email = test_input($_POST["email"]);

            // Pengecekan apakah format email sudah benar
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format";
            } else {
                $emailSuc = "VALID";
            }
        }

        if (empty($_POST["website"])) {
            $websiteErr = "Website harus diisi";
        } else {
            $websiteSuc = "VALID";
            $website = test_input($_POST["website"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        } else {
            $genderSuc = "VALID";
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div id="formInput">

        <h2>Posting Komentar </h2>

        <p><span class="error">* Harus Diisi.</span></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <td>Nama:</td>
                    <td><input type="text" name="nama" value="<?php echo $nama; ?>">
                        <span class="error">* <?php echo $namaErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>E-mail: </td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>">
                        <span class="error">* <?php echo $emailErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>Website:</td>
                    <td> <input type="text" name="website" value="<?php echo $website; ?>">
                        <span class="error">* <?php echo $websiteErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>Komentar:</td>
                    <td> <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea></td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="L" <?= $gender == "L" ? "checked" : "" ?>>Laki-Laki
                        <input type="radio" name="gender" value="P" <?= $gender == "P" ? "checked" : "" ?>>Perempuan
                        <span class="error">* <?php echo $genderErr; ?></span>
                    </td>
                </tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </table>
        </form>
    </div>



    <?php
    if ($namaSuc == "VALID" and $emailSuc == "VALID" and $genderSuc == "VALID" and $websiteSuc == "VALID") {
        echo "<h2>Data yang anda isi:</h2>";
        echo "Nama : " . $nama;
        echo "<br>";

        echo "E-Mail : " . $email;
        echo "<br>";

        echo "Website : " . $website;
        echo "<br>";

        echo "Komentar : " . $comment;
        echo "<br>";

        echo "Jenis Kelamin : " . $gender;

        echo '<br><br><a href="index.php">Kembali ke form input</br>';
        echo "<script>document.getElementById('formInput').style.display = 'none'</script>";
    }
    ?>

</body>

</html>