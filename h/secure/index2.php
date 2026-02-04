<?php include_once("checklogin.php"); ?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบหลังบ้าน - จุฬาลักษณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style> body { font-family: 'Kanit', sans-serif; background-color: #f8f9fc; } </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <span class="navbar-text text-white ms-auto">
        ยินดีต้อนรับ: <strong><?php echo $_SESSION['aname']; ?></strong> &nbsp;|&nbsp; 
        <a href="logout.php" class="btn btn-danger btn-sm">ออกจากระบบ</a>
    </span>
  </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-secondary">เมนูจัดการระบบ</h2>
        <p class="text-muted">เลือกระบบที่ต้องการจัดการ</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center hover-shadow">
                <div class="card-body py-5">
                    <h3 class="card-title text-primary">📦 จัดการสินค้า</h3>
                    <p class="card-text text-muted">เพิ่ม ลบ แก้ไข รายการสินค้า</p>
                    <a href="products.php" class="btn btn-outline-primary mt-3">คลิกเพื่อจัดการ</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body py-5">
                    <h3 class="card-title text-success">📝 จัดการออเดอร์</h3>
                    <p class="card-text text-muted">ดูรายการสั่งซื้อและสถานะ</p>
                    <a href="orders.php" class="btn btn-outline-success mt-3">คลิกเพื่อจัดการ</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body py-5">
                    <h3 class="card-title text-info">👥 จัดการลูกค้า</h3>
                    <p class="card-text text-muted">ดูรายชื่อลูกค้าสมาชิก</p>
                    <a href="customers.php" class="btn btn-outline-info mt-3">คลิกเพื่อจัดการ</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>