<meta charset="utf-8">
<?php
include_once("connectdb.php");

$id=$_GET['id'];        //รับค่า id จาก URL เช่น delete_region.php?id=3
$sql="DELETE FROM `regions` WHERE `regions`.`r_id`={$id} ";     //สร้างคำสั่ง SQL ลบข้อมูล
mysqli_query($conn,$sql) or die ("ลบข้อมูลไม่ได้");     //สั่งรันคำสั่ง SQL

//สั่งให้กลับไปหน้า a.php
echo"<script>";
echo "window.location='a.php';";
echo"</script>";
?>