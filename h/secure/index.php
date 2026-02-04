<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>เข้าสู่ระบบหลังบ้าน - จุฬาลักษณ์</h1>

<form method ="post" action="">
Username <input type="text" name="auser" autofocus required><br>
Password <input type="password" name="apwd" required><br>
<button type="submit" name="Submit">LOGIN</button>
</form>

<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    // ป้องกัน SQL Injection
    $u = mysqli_real_escape_string($conn, $_POST['auser']);
    $p = mysqli_real_escape_string($conn, $_POST['apwd']);
    
    $sql = "SELECT * FROM admin WHERE a_username ='{$u}' AND a_password ='{$p}' LIMIT 1";
    $rs = mysqli_query($conn, $sql);
    
    // เช็คว่า Query ผ่านไหม ถ้าไม่ผ่านให้แจ้ง Error
    if(!$rs) {
        die("Error Query: " . mysqli_error($conn));
    }

    $num = mysqli_num_rows($rs);
    
    if ($num == 1) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name']; // แก้คำผิดจาก $SESSION เป็น $_SESSION
        
        echo "<script>";
        echo "window.location='index2.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Username หรือ Password ไม่ถูกต้อง');";
        echo "</script>";
    }
}
?>
</body>
</html>