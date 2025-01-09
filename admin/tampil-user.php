<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:login.php");
}
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Daftar User</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>
                            <a href="tambah-user.php" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM user ORDER BY user_id DESC");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <a href="edit-user.php?id=<?php echo $data['user_id'];?>" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="hapus-user.php?id=<?php echo $data['user_id'];?>" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>