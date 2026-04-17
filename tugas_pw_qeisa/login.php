<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SkyTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Inter', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background: #4e73df;
            border: none;
            padding: 0.8rem;
            border-radius: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card p-4">
                    <div class="text-center mb-4">
                        <div class="h1 text-primary mb-2"><i class="fas fa-plane"></i></div>
                        <h4 class="fw-bold">SkyTicket Dashboard</h4>
                        <p class="text-muted">Silakan masuk untuk memesan tiket</p>
                    </div>
                    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
                        <div class="alert alert-danger border-0 small py-2">Username atau password salah!</div>
                    <?php endif; ?>
                    <form action="cek_login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg bg-light border-0" placeholder="Username" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg bg-light border-0" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">MASUK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>