<?php
session_start();
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd = $_POST['apwd'];

    // 1. ป้องกัน SQL Injection ด้วย Prepared Statement
    $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_assoc($result)) {
        // 2. ตรวจสอบรหัสผ่านที่เข้ารหัส (รองรับทั้ง Hash และ Plain text เพื่อให้คุณเข้าใช้งานได้ก่อน)
        if (password_verify($pwd, $data['a_password']) || $pwd === $data['a_password']) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        }
    }
    $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!";
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - จุฬาลักษณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #002366 50%, #ffcc00 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .card-header {
            background-color: #002366;
            color: #ffcc00;
            text-align: center;
            padding: 2rem;
            border: none;
        }
        .btn-primary {
            background-color: #002366;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #001a4d;
            transform: translateY(-2px);
        }
        .form-control:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 0 0.25 hide rgba(255, 204, 0, 0.25);
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0 fw-bold">เข้าสู่ระบบ</h3>
            <small>จัดการระบบโดย จุฬาลักษณ์</small>
        </div>
        <div class="card-body p-4 bg-white">
            <?php if(isset($error)): ?>
                <div class="alert alert-danger py-2 text-center"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Username</label>
                    <input type="text" name="auser" class="form-control form-control-lg" placeholder="กรอกชื่อผู้ใช้" autofocus required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark">Password</label>
                    <input type="password" name="apwd" class="form-control form-control-lg" placeholder="กรอกรหัสผ่าน" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg fw-bold text-warning">LOGIN</button>
                </div>
            </form>
        </div>
        <div class="card-footer bg-light text-center py-3">
            <small class="text-muted">© 2026 จุฬาลักษณ์ ลมดา (พลอย)</small>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>