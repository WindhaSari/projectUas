<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
include "header.php";
?>

<div class="container">
    <h2>Daftar Blog</h2>
    <table id="blogTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>
                    <a href="tulis-blog.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $result = $koneksi->query("SELECT * FROM blog ORDER BY tanggal DESC");
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['judul']; ?></td>
                    <td><img src="../images/<?php echo $row['gambar']; ?>" width="100"></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td>
                        <a href="edit-blog.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-xs btn-warning glyphicon glyphicon-edit"></button>
                        </a>
                        <a href="hapus-blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?');">
                            <button class="btn btn-xs btn-danger glyphicon glyphicon-trash"></button>
                        </a>
                    </td>
                </tr>
            <?php
 }
 ?>
</tbody>
</table>
</div>
<?php include "footer.php";?>
<script>
$(document).ready(function() {
$('#blogTable').DataTable();
});
</script>

