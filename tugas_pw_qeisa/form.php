<?php
session_start();
if(!isset($_SESSION['username'])){ header("location:login.php"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SkyTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 260px; }
        body { background: #f8f9fc; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: #4e73df;
            position: fixed;
            color: white;
            padding-top: 2rem;
        }
        .main-content { margin-left: var(--sidebar-width); padding: 2rem; }
        .nav-link { color: rgba(255,255,255,.8); border-radius: 0.5rem; margin: 0.2rem 1rem; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,.1); color: white; }
        .form-card { border: none; border-radius: 1rem; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15); }
    </style>
</head>
<body>

    <div class="sidebar d-none d-md-block">
        <div class="text-center mb-4">
            <h5 class="fw-bold"><i class="fas fa-paper-plane me-2"></i> SkyTicket</h5>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a class="nav-link" href="#"><i class="fas fa-history me-2"></i> Riwayat</a>
            <hr class="mx-3 border-light opacity-25">
            <a class="nav-link text-warning" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Pesan Tiket Baru</h4>
            <div class="user-profile">
                <span class="me-2 text-muted small">Halo, <strong><?= $_SESSION['username'] ?></strong></span>
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['username'] ?>&background=4e73df&color=fff" class="rounded-circle" width="35">
            </div>
        </header>

        <div class="row">
            <div class="col-lg-8">
                <div class="card form-card">
                    <div class="card-body p-4">
                        <form action="proses.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Nama Penumpang</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama sesuai KTP" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Maskapai</label>
                                    <select name="kode" class="form-select">
                                        <option value="GRD">Garuda Indonesia (GRD)</option>
                                        <option value="MPT">Merpati Air (MPT)</option>
                                        <option value="BTV">Batavia Air (BTV)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Kelas Penerbangan</label>
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelas" value="Eksekutif" checked>
                                            <label class="form-check-label">Eksekutif</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelas" value="Bisnis">
                                            <label class="form-check-label">Bisnis</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelas" value="Ekonomi">
                                            <label class="form-check-label">Ekonomi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jumlah Tiket</label>
                                    <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
                                </div>
                                <div class="col-12 mt-4 text-end">
                                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">PROSES SEKARANG</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>