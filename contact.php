<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $email = $koneksi->real_escape_string($_POST['email']);
    $pesan = $koneksi->real_escape_string($_POST['pesan']);

    $query = "INSERT INTO kontak (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', NOW())";
    if ($koneksi->query($query) === TRUE) {
        header("location:contact.php?pesan=terkirim");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
    <div class="row">
    <h2>Kontak Kami</h2>
    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'terkirim'): ?>
        <div class="alert alert-success" role="alert">
            Pesan Anda telah berhasil dikirim!
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea name="pesan" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Kirim Pesan</button>
    </form>
    </div>
    </div>
</div>
<?php include 'footer.php';?>