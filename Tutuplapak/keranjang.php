<?php
    session_start();
    include "header.php";
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        $id_keranjang = $_POST['id'];
        $qty = $_POST['qty'];

        $edit = mysqli_query(koneksiToko(), "UPDATE keranjang SET qty='$qty' WHERE id_keranjang='$id_keranjang'");
        
        if($edit) {
            echo "
                <script>
                    alert('KERANJANG BERHASIL DIPERBARUI!');
                    window.location='keranjang.php';
                </script>
            ";
        }
    } else if(isset($_GET['del'])) {
        $id_keranjang = $_GET['id'];
        $del = mysqli_query(koneksiToko(), "DELETE FROM keranjang WHERE id_keranjang='$id_keranjang'");

        if ($del) {
            echo "
                <script>
                    alert('1 PRODUK DIHAPUS!');
                    window.location='keranjang.php';
                </script>
            ";
        }
    }
?>

<div class="container" style="padding-bottom: 300px;">
    <h2 style="width: 100%; border-bottom: 4px solid red;">
        <b>Keranjang</b>
    </h2>
    <table class="table table-striped table-inverse table-responsive">
        <?php
            if (isset($_SESSION['username']) && isset($_SESSION['kd_cs'])) {
                $kode_cs = $_SESSION['kd_cs'];

                //cek jumlah keranjang
                $cek = mysqli_query(koneksiToko(), "SELECT * FROM keranjang WHERE kode_customer='$kode_cs'");
                $jml = mysqli_num_rows($cek);
                if ($jml > 0) {
                    // Tambahkan kode CSS untuk tombol "Update" dan "Delete"
                    echo '
                        <style>
                            .action-buttons {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                gap: 5px;
                            }
                        </style>
                    ';
        ?>
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">No</th>
                            <th style="text-align: center;" scope="col">Image</th>
                            <th style="text-align: center; width: 190px;" scope="col">Nama</th>
                            <th style="text-align: center;" scope="col">Harga</th>
                            <th style="text-align: center;" scope="col">Qty</th>
                            <th style="text-align: center; width: 130px;" scope="col">SubTotal</th>
                            <th style="text-align: center;" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysqli_query(koneksiToko(), "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer='$kode_cs'");

                        $no = 1;
                        $hasil = 0;
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                            <tr>
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <img src="image/produk/<?php echo $row['gambar']; ?>" width="100">
                                </td>
                                <td>
                                    <?php echo $row['nama']; ?>
                                </td>
                                <td>
                                    Rp. <?php echo number_format($row['hrg']); ?>
                                </td>
                                <td>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['keranjang']; ?>">
                                        <input type="number" name="qty" class="form-control" style="width: 60px; text-align: center;" value="<?php echo $row['jml'] ?>">
                                </td>
                                <td>
                                    Rp. <?php echo number_format($row['hrg'] * $row['jml']); ?>
                                </td>
                                <td class="action-buttons">
                                    <button type="submit" name="submit" class="btn btn-warning">UPDATE</button>
                                    </form>
                                    <a href="keranjang.php?del=1&id=<?php echo $row['keranjang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">DELETE</a>
                                </td>
                            </tr>
                    <?php
                            $sub = $row['hrg'] * $row['jml'];
                            $hasil += $sub;
                            $no++;
                        }
                    ?>

                    <tr>
                        <td colspan="5" style="text-align: right; font-weight: bold;">
                            Grand Total =
                        </td>
                        <td style="font-weight: bold;">
                            <?php 
                                if(isset($hasil)) {
                                    echo "Rp. " . number_format($hasil);
                                } else {
                                    echo "Rp. 0";
                                }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="checkout.php" class="btn btn-primary">Checkout</a>
                        </td>
                    </tr>
                    <?php
                } else {
                    echo "
                        <tr>
                            <th style='text-align: center;' scope='col'>No</th>
                            <th style='text-align: center;' scope='col'>Image</th>
                            <th style='text-align: center; width: 190px;' scope='col'>Nama</th>
                            <th style='text-align: center;' scope='col'>Harga</th>
                            <th style='text-align: center;' scope='col'>Qty</th>
                            <th style='text-align: center; width: 130px;' scope='col'>SubTotal</th>
                            <th style='text-align: center;' scope='col'>Action</th>
                        </tr>
                        <tr>
                            <td colspan='7' class='text-center bg-warning'>
                                <h5><b>KERANJANG BELANJA ANDA KOSONG</b></h5>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "
                    <tr>
                        <th style='text-align: center;' scope='col'>No</th>
                        <th style='text-align: center;' scope='col'>Image</th>
                        <th style='text-align: center; width: 190px;' scope='col'>Nama</th>
                        <th style='text-align: center;' scope='col'>Harga</th>
                        <th style='text-align: center;' scope='col'>Qty</th>
                        <th style='text-align: center; width: 130px;' scope='col'>SubTotal</th>
                        <th style='text-align: center;' scope='col'>Action</th>
                    </tr>
                    <tr>
                        <td colspan='7' class='text-center bg-danger'>
                            <h5><b>SILAHKAN LOGIN TERLEBIH DAHULU</b></h5>
                        </td>
                    </tr>
                ";
            }
        ?>
        </tbody>
    </table>
</div>

<?php
    include "footer.php";
?>
