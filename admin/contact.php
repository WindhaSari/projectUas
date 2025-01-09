<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
include "header.php";
include "../koneksi.php";
?>

<div class="container">
    <h2>Pesan Kontak</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $koneksi->query("SELECT * FROM kontak ORDER BY tanggal DESC");
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['pesan']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                    <td>
                        <a href="hapus-pesan.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');"><i 
                        class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>