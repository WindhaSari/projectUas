<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
include "header.php";
?>

<div class="container">
    <h2>Daftar menu</h2>
    <table id="produkTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th><a href="tambah-produk.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a></th>
                </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $result = $koneksi->query("SELECT * FROM menu");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['deskripsi']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td><img src='../images/{$row['gambar']}' width='100'></td>
                        <td>
                            <a href='edit-menu.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='hapus-menu.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>


    <?php include 'footer.php'; ?>
               