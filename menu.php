<?php
include "navbar.php";
include "koneksi.php";

$menu_per_page = 16;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? $koneksi->real_escape_string($_GET['search']) : '';

$offset = ($current_page - 1) * $menu_per_page;

// menghitung data pencarian
if (!empty($search)) {
    $total_menu_result = $koneksi->query("SELECT COUNT(*) as total FROM menu 
        WHERE nama LIKE '%$search%' 
        OR deskripsi LIKE '%$search%'");
} else {
    $total_menu_result = $koneksi->query("SELECT COUNT(*) as total FROM menu");
}

$total_menu = $total_menu_result->fetch_assoc()['total'];
$total_pages = ceil($total_menu / $menu_per_page);

// mencari menu
if (!empty($search)) {
    $sql = "SELECT * FROM menu 
            WHERE nama LIKE '%$search%' 
            OR deskripsi LIKE '%$search%' 
            ORDER BY id DESC 
            LIMIT $menu_per_page OFFSET $offset";
} else {
    $sql = "SELECT * FROM menu 
            ORDER BY id DESC 
            LIMIT $menu_per_page OFFSET $offset";
}

$result = $koneksi->query($sql);

// Tampilkan pesan jika tidak ada hasil pencarian
if ($result->num_rows == 0 && !empty($search)) {
    echo '<div class="container"><div class="alert alert-info">Tidak ada menu yang sesuai dengan pencarian: "' . htmlspecialchars($search) . '"</div></div>';
}
?>

<!-- card start -->
<div class="container">
    <div class="row">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <img src="images/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['nama']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row['deskripsi']; ?>
                        </p>
                        <p class="card-price">Rp
                            <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                        </p>
                        <button type="button" class="btn btn-custom">Order Now</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- card end -->
<!-- pagination start -->
<div class="container">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-centered">
            <?php if ($current_page > 1): ?>
            <li>
                <a href="?page=<?php echo $current_page - 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">
                    <?php echo $i; ?>
                </a>
            </li>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
            <li>
                <a href="?page=<?php echo $current_page + 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<!-- pagination end -->
           
<?php include 'footer.php'?>