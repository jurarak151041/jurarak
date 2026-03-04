<meta charset="utf-8">
<?php
include_once("connectdb.php");      //PHP และเชื่อมต่อฐานข้อมูล

if(isset($_GET['id'])){     //ตรวจสอบว่ามีค่า id ส่งมาหรือไม่
    //รับค่าจาก URL
    $id = $_GET['id'];
    $ext = $_GET['ext']; 

    $sql_del = "DELETE FROM provinces WHERE p_id = '{$id}'";        //คำสั่งลบข้อมูลจากฐานข้อมูล
    mysqli_query($conn, $sql_del) or die ("ลบข้อมูลไม่ได้: " . mysqli_error($conn));

    if($ext != ""){
        $file_path = "images/" . $id . "." . $ext;      //สร้าง path ของไฟล์
        if(file_exists($file_path)){        //ตรวจสอบว่าไฟล์มีอยู่จริงไหม
            unlink($file_path);     //ลบไฟล์
        }
    }
    //แสดงข้อความแจ้งเตือน + กลับหน้าเดิม
    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='b.php';"; 
    echo "</script>";
} else {        //กรณีไม่มี id ส่งมา
    echo "<script>window.location='b.php';</script>";
}
?>