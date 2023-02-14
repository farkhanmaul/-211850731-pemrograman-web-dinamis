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
    $namaErr = $nimErr = $genderErr = $prodiErr = $fakultasErr = "";
    $nama = $nim = $gender = $prodi = $fakultas = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["nim"])) {
            $nimErr = "NIM harus diisi";
        } else {
            if (strlen($_POST["nim"]) < 10) {
                $nimErr = "NIM harus 10 digit";
            } else {
                $nim = test_input($_POST["nim"]);
            }
        }

        if (empty($_POST["fakultas"])) {
            $fakultasErr = "Fakultas harus diisi";
        } else {
            $fakultas = test_input($_POST["fakultas"]);
        }

        if (empty($_POST["prodi"])) {
            $prodiErr = "Prodi harus diisi";
        } else {
            $prodi = test_input($_POST["prodi"]);
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        } else {
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
    <h2>Posting Komentar </h2>

    <p><span class="error">* Harus Diisi.</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama">
                    <span class="error">* <?php echo $namaErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>NIM: </td>
                <td><input type="number" name="nim">
                    <span class="error">* <?php echo $nimErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Fakultas:</td>
                <td> <input type="text" name="fakultas">
                    <span class="error">* <?php echo $fakultasErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Prodi:</td>
                <td> <input type="text" name="prodi">
                    <span class="error">* <?php echo $prodiErr; ?></span>
                </td>
            </tr>


            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-Laki
                    <input type="radio" name="gender" value="P">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </table>
    </form>

    <?php
    echo "<h2>Data yang anda isi:</h2>";
    echo $nama;
    echo "<br>";

    echo $nim;
    echo "<br>";

    echo $fakultas;
    echo "<br>";

    echo $prodi;
    echo "<br>";

    echo $gender;
    ?>

</body>

</html>