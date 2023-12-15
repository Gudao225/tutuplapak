<?php
    session_start();
//     if (!isset($_SESSION['username'])) {
//         header('Location: index.php');
//     exit;
// }
    include "header.php";
    include "crudproduk.php";
    if(isset($_SESSION['kd_cs'])) {
        $kode_cs = $_SESSION['kd_cs'];
    }
?>
<?php
if(isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $barang = cariBarang($keyword);
} else {
    $barang = bacaSemuaProduk();
}
?>
</div>

<!-- Slider image -->
<style>
  .carousel-inner .item img {
    width: 700%; /* Atur lebar gambar sesuai kebutuhan */
    height: auto; /* Biarkan tinggi gambar mengikuti aspek rasio */
  }
</style>

<!-- Slider image -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/prom1.jpg">
    </div>

    <div class="item">
      <img src="image/prom2.jpg">
    </div>

    <div class="item">
      <img src="image/prom3.jpg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<style>
  body {
    font-family: Helvetica, sans-serif;
    padding: 0.3%;
  }
</style>
<div class="thumbnail">
  <div class="image-container">
    <div class="magnifying-glass"></div>
  </div>
</div>

<div class="kategori">
  <ul>
    <li><a href="#">Kategori 1</a></li>
    <li><a href="#">Kategori 2</a></li>
    <li><a href="#">Kategori 3</a></li>
    <li><a href="#">Kategori 4</a></li>
    <li><a href="#">Kategori 5</a></li>
  </ul>
</div>
<style>
  .kategori {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center; /* Mengatur konten menjadi berada di tengah */
}

.kategori ul {
  display: inline-block; /* Mengatur daftar kategori agar menjadi elemen inline */
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.kategori li {
  display: inline;
  margin-right: 10px;
}

.kategori li a {
  text-decoration: none;
  color: #333;
  padding: 5px 10px;
}

.kategori li a:hover {
  background-color: #333;
  color: #fff;
}
.thumbnail img {
  transition: transform 0.3s;
}

.thumbnail:hover img {
  transform: scale(1.1);
}


</style>
<!-- PRODUK TERBARU -->
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid red; margin-top: 80px;"><b>Semua</b></h2>
    <div class="row">
        <?php
            // $kode_cs = $_SESSION['kd_cs'];
            foreach (bacaSemuaProduk() as $dataProduk) {
                $kodeProduk = $dataProduk['kode_produk'];
                $namaProduk = $dataProduk['nama'];
                $gambarProduk = $dataProduk['image'];
                $deskripsiProduk = $dataProduk['deskripsi'];
                $hargaProduk = $dataProduk['harga'];
        ?>

                <div class='col-sm-6 col-md-4' >
                    <div class='thumbnail'>
                        <img src='image/produk/<?php echo $gambarProduk ?>' alt='<?php echo $namaProduk ?>' width="400" height="400">
                        <div class='caption'>
                            <div style="height: 40px">
                            <h4><?php echo $namaProduk ?></h3>
                            </div>
                            <h3>Rp. <?php echo number_format($hargaProduk, 0, ',', '.') ?></h4>
                            <div class='row'>
                            <div class='col-md-6'>
                                <a href='detail_produk.php?produk=<?php echo $kodeProduk ?>' class='btn btn-primary btn-block'>Details</a>
                            </div>
                            <?php if(isset($_SESSION['kd_cs'])) { ?>
                                <div class='col-md-6'>
                                    <a href="proses/add.php?produk=<?php echo $kodeProduk ?>&kd_cs=<?php echo $kode_cs; ?>&hal=1" class='btn btn-success btn-block' role='button'><i class='glyphicon glyphicon-shopping-cart'></i>Tambah</a>
                                </div>      
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i>Tambah</a>
                                </div>
                            <?php
                            }       
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php        
            }
        ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php
    include "footer.php";
?>