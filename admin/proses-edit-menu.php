<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
 
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $harga = $koneksi->real_escape_string($_POST['harga']);
    $gambar = $_FILES['gambar']['name'];
    $target = "../images/" . basename($gambar);

    if (!empty($gambar)) {
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
            $query = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga='$harga', gambar='$gambar' WHERE id='$id'";
        } else {
            echo "Gagal mengupload gambar.";
            exit;
        }
    } else {
        $query = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id='$id'";
    }

    if ($koneksi->query($query) === TRUE) {
        header("location:data-menu.php?pesan=updateBerhasil");
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
}
}
?>