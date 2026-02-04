<?php
session_start();

// ตรวจสอบว่าถ้ายังไม่ได้ Login ให้เด้งกลับไปหน้า Login (เพื่อความปลอดภัย)
if (!isset($_SESSION['aid'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อน'); window.location='login.php';</script>";
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการระบบ - จุฬาลักษณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --bs-blue-dark: #003366; /* น้ำเงินเข้ม */
            --bs-yellow-gold: #ffcc00; /* เหลืองทอง */
        }
        body { background-color: #f4f4f4; }
        .navbar { background-color: var(--bs-blue-dark); border-bottom: 4px solid var(--bs-yellow-gold); }
        .nav-link, .navbar-brand { color: white !important; }
        .card-menu {
            transition: transform 0.2s;
            border: none;
            border-top: 5px solid var(--bs-yellow-gold);
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .icon-box {
            font-size: 3rem;
            color: var(--bs-blue-dark);
        }
        .btn-logout { background-color: var(--bs-yellow-gold); color: #000; font-weight: bold; }
        .btn-logout:hover { background-color: #e6b800; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-cpu-fill me-2"></i>ระบบจัดการหลังบ้าน</a>
        <div class="d-flex align-items-center">
            <span class="text-white me-3">
                <i class="bi bi-person-circle me-1 text-warning"></i>
                แอดมิน: <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
            </span>
            <a href="logout.php" class="btn btn-logout btn-sm">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row mb-4 text-center">
        <div class="col">
            <h1 class="display-5 fw-bold" style="color: var(--bs-blue-dark);">Dashboard</h1>
            <p class="lead">ยินดีต้อนรับสู่ระบบจัดการร้านค้าของ จุฬาลักษณ์</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card card-menu h-100 text-center p-4">
                    <div class="card-body">
                        <div class="icon-box mb-3"><i class="bi bi-box-seam"></i></div>
                        <h4 class="card-title text-dark">จัดการสินค้า</h4>
                        <p class="card-text text-muted">เพิ่ม แก้ไข ลบ ข้อมูลสินค้าในคลัง</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card card-menu h-100 text-center p-4">
                    <div class="card-body">
                        <div class="icon-box mb-3"><i class="bi bi-cart-check"></i></div>
                        <h4 class="card-title text-dark">จัดการออเดอร์</h4>
                        <p class="card-text text-muted">ตรวจสอบและอัปเดตสถานะคำสั่งซื้อ</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="customers.php" class="text-decoration-none">
                <div class="card card-menu h-100 text-center p-4">
                    <div class="card-body">
                        <div class="icon-box mb-3"><i class="bi bi-people"></i></div>
                        <h4 class="card-title text-dark">จัดการลูกค้า</h4>
                        <p class="card-text text-muted">ดูข้อมูลและประวัติการซื้อของสมาชิก</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>