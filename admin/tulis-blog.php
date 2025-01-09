<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
include "header.php";
?>

<div class="container">
    <h2>Tulis Blog Baru</h2>
    <form action="proses-tulis-blog.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="konten">Konten</label>
            <textarea name="konten" class="form-control" id="editor" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Blog</button>
    </form>
</div>

<script src="../bootstrap/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>