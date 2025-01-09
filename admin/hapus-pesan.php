<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
    exit();
}

include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $query = "DELETE FROM kontak WHERE id='$id'";

    if ($koneksi->query($query) === TRUE) {
        header("location:contact.php?pesan=hapusBerhasil");
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    header("location:contact.php");
}
?>   