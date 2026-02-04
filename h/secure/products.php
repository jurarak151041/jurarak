<?php include_once("checklogin.php"); ?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - จุฬาลักษณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style> body { font-family: 'Kanit', sans-serif; background-color: #f8f9fc; } </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index2.php">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="products.php">จัดการสินค้า</a></li>
        <li class="nav-item"><a class="nav-link" href="orders.php">จัดการออเดอร์</a></li>
        <li class="nav-item"><a class="nav-link" href="customers.php">จัดการลูกค้า</a></li>
      </ul>
      <span class="navbar-text text-white">
        <?php echo $_SESSION['aname']; ?> &nbsp;
        <a href="logout.php" class="btn btn-danger btn-sm ms-2">ออก</a>
      </span>
    </div>
  </div>
</nav>

<div class="container bg-white p-4 rounded shadow-sm">
    <h2 class="mb-4 border-bottom pb-2">📦 จัดการสินค้า</h2>
    
    <div class="alert alert-info">
        ส่วนแสดงผลข้อมูลสินค้า (ยังไม่มีข้อมูล)
    </div>
    
    <a href="index2.php" class="btn btn-secondary">« กลับหน้าหลัก</a>
</div>

</body>
</html>