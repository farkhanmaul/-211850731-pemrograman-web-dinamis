<?php
include "koneksi.php";


if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim' LIMIT 1";
    $tampil = mysqli_query($con, $sql);
    if (mysqli_num_rows($tampil) > 0) {
        while ($r = mysqli_fetch_assoc($tampil)) {
            $response['data']['mahasiswa'] = [
                'nim' => $r['nim'],
                'nama' => $r['nama'],
            ];
        }

        $tampil = mysqli_query($con, "SELECT  mata_kuliah.kode, mata_kuliah.nama as nama_matkul, mata_kuliah.sks, mata_kuliah.sem, khs.nilai FROM khs, mahasiswa, mata_kuliah WHERE mahasiswa.nim = '$nim' and mata_kuliah.id = khs.id_matkul and mahasiswa.id = khs.id_mhs");

        if (mysqli_num_rows($tampil) > 0) {
            while ($r = mysqli_fetch_assoc($tampil)) {
                $response["data"]["khs"][] = $r;
            }
        } else {
            $response["data"]["khs"] = "Tidak ada data KHS!";
        }
        echo json_encode($response);
    } else {
        $response["pesan_error"] = "NIM tidak ditemukan";
        echo json_encode($response);
    }
} else {
    $response["pesan_error"] = "Variable GET NIM tidak ditemukan!";
    echo json_encode($response);
}
