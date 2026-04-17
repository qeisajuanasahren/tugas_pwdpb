<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$jumlah = $_POST['jumlah'];

$query = mysqli_query($conn,"SELECT * FROM pesawat WHERE kode='$kode' AND kelas='$kelas'");
$data = mysqli_fetch_assoc($query);

$nama_pesawat = $data['nama'] ?? "Pesawat Tidak Terdaftar";
$harga = $data['harga'] ?? 0;
$total = $harga * $jumlah;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket - SkyTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; }
        .ticket-card { border: none; border-left: 8px solid #4e73df; border-radius: 1rem; }
        .barcode { font-family: 'Libre Barcode 39', cursive; font-size: 40px; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ticket-card shadow-sm">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <h2 class="fw-bold text-primary mb-0">E-TICKET</h2>
                                <p class="text-muted">ID Transaksi: STK-<?= rand(1000, 9999) ?></p>
                            </div>
                            <div class="text-end">
                                <h4 class="fw-bold mb-0">JAKARTA <i class="fas fa-plane text-muted mx-2"></i> MALAYSIA</h4>
                                <small class="text-muted"><?= date('D, d M Y') ?></small>
                            </div>
                        </div>

                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small text-uppercase">Nama Penumpang</label>
                                <p class="h5 fw-bold"><?= $nama ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small text-uppercase">Maskapai / Kelas</label>
                                <p class="h5 fw-bold"><?= $nama_pesawat ?> (<?= $kelas ?>)</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small text-uppercase">Harga Tiket</label>
                                <p class="fw-bold text-success">Rp <?= number_format($harga,0,',','.') ?></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small text-uppercase">Jumlah</label>
                                <p class="fw-bold"><?= $jumlah ?> Tiket</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small text-uppercase font-weight-bold">Total Pembayaran</label>
                                <p class="h4 fw-bold text-primary">Rp <?= number_format($total,0,',','.') ?></p>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top text-center">
                            <p class="mb-0 text-muted">Terima kasih telah terbang bersama SkyTicket.</p>
                            <div class="text-center mt-3 no-print">
                                <button onclick="window.print()" class="btn btn-outline-dark btn-sm me-2"><i class="fas fa-print me-2"></i>Cetak</button>
                                <a href="dashboard.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>