<?php
session_start();
if (empty($_SESSION['user_id'])){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Makanan - WinFoodEats</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
        <h2 class="text-center">Tambah Menu Makanan</h2>
        <form action="proses-tambah-produk.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Makanan</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Makanan</label>
                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Makanan</label>
                <input type="file" name="gambar" accept="image/*" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Makanan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
        </div>
    </div>
</div>

    <script src="../bootstrap/js/jQuery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>