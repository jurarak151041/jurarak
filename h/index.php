<?php session_start(); ?> <!doctype html>
...
<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    // ป้องกัน SQL Injection เบื้องต้น
    $username = mysqli_real_escape_string($conn, $_POST['auser']);
    $password = mysqli_real_escape_string($conn, $_POST['apwd']);
    
    $sql = "SELECT * FROM admin WHERE a_username ='{$username}' AND  a_password ='{$password}' LIMIT 1" ;
    $rs = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($rs);
    
    if ($num == 1) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name']; // แก้ $SESSION เป็น $_SESSION
        echo "<script>";
        echo "window.location='index2.php';";
        echo "</script>";
    } 
    // ... ส่วนที่เหลือเหมือนเดิม