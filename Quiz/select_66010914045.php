<?php
include_once("connectdb.php");      //คือการเรียกไฟล์ connectdb.php

if(isset($_POST['Submit'])){        //เช็คว่า มีการกดปุ่มบันทึกหรือยัง

//รับค่าจากฟอร์ม
    $cname = $_POST['cname'];
    $cid = $_POST['cid'];
   }
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>ฟอร์มรับข้อมูล</h1>

<form medthod="post" action="">
ชื่อภาพยนตร์ <input type="text" name="cname" autofocus required><br>
ประเภทภาพยนตร์ <br><textarea name="ctype" cols="40" rows="4"></textarea><br>

มาแรง!
    <select name="rid">     
    <?php
    $sql_cinima = "SELECT * FROM cinima";      //ดึงข้อมูลจากตาราง regions
    $rs_cinima = mysqli_query($conn, $sql_cinima);
    while ($data_cinima = mysqli_fetch_array($rs_region)){
    ?>   
        <option value="<?php echo $data_cinima['c_id'] ; ?>"><?php echo $data_cinima['c_name'] ;?></option>     //แล้ววนลูปสร้าง option
    <?php } ?>
    </select>
    <br><br>
    
    <button type="submit" name="Submit">บันทึก</button> 
</form>
<br><hr><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ชื่อภาพยนตร์</th>
        <th>ประเภทภาพยนตร์</th>
        <th>จำนวนที่นั่ง</th>
    </tr>
</table>

</body>
</html>
<?php mysqli_close($conn); ?>       <!--ปิดการเชื่อมต่อฐานข้อมูล-->
