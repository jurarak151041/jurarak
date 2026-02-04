<?php session_start(); ?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - จุฬาลักษณ์ ลมดา (พลอย)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f4f6f9; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 100%; max-width: 400px; border: none; shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 15px; }
        .card-header { background-color: #4e73df; color: white; text-align: center; border-radius: 15px 15px 0 0 !important; padding: 20px; }
        .btn-primary { background-color: #4e73df; border: none; }
        .btn-primary:hover { background-color: #2e59d9; }
    </style>
</head>
<body>

<div class="card login-card shadow-lg">
    <div class="card-header">
        <h4 class="mb-0">เข้าสู่ระบบหลังบ้าน</h4>
        <small>จุฬาลักษณ์</small>
    </div>
    <div class="card-body p-4">
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label text-muted">Username</label>
                <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted">Password</label>
                <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
            </div>
            <button type="submit" name="Submit" class="btn btn-primary w-100 py-2">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    $u = mysqli_real_escape_string($conn, $_POST['auser']);
    $p = mysqli_real_escape_string($conn, $_POST['apwd']);
    
    $sql = "SELECT * FROM admin WHERE a_username ='{$u}' AND a_password ='{$p}' LIMIT 1";
    $rs = mysqli_query($conn, $sql);
    
    if ($rs && mysqli_num_rows($rs) == 1) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
        echo "<script>window.location='index2.php';</script>";
    } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
    }
}
?>

</body>
</html>