<?php include 'navbar.php'?>
<!-- card start -->
<div class="container">
    <div class="row">
        <?php
        include "koneksi.php";
        $result = $koneksi->query("SELECT * FROM menu");
        while($row = $result->fetch_assoc()) {
        ?>
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
    
    <?php
        }
    ?>
</div> 
</div>

<!-- card end-->

<!-- pagination start -->
<div class="container">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php include 'footer.php'?>