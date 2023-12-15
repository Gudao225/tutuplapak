<?php
    session_start();
    include "koneksi.php";
    
    // Ambil data yang dikirimkan melalui form
    $produk_id = mysqli_real_escape_string(koneksiToko(), $_POST['produk_id']);
    $rating = mysqli_real_escape_string(koneksiToko(), $_POST['rating']);
    $komentar = mysqli_real_escape_string(koneksiToko(), $_POST['komentar']);

    // Lakukan operasi penyimpanan rating dan komentar ke dalam database
    // Anda perlu menambahkan kode SQL untuk menyimpan data ke tabel "rating"

    // Contoh kode SQL untuk menyimpan data ke tabel "rating"
    $sql = "INSERT INTO rating (produk_id, rating, komentar) VALUES ('$produk_id', '$rating', '$komentar')";

    // Jalankan query SQL
    if (mysqli_query(koneksiToko(), $sql)) {
        // Rating dan komentar berhasil disimpan
        echo "Rating dan komentar berhasil ditambahkan.";
    } else {
        // Terjadi kesalahan saat menyimpan rating dan komentar
        echo "Terjadi kesalahan saat menambahkan rating dan komentar: " . mysqli_error(koneksiToko());
    }
?>
