<?php       //เปิด PHP และเชื่อมต่อฐานข้อมูล
include_once("connectdb.php");      //เรียกไฟล์เชื่อมต่อฐานข้อมูลเข้ามาใช้งาน

// ส่วนบันทึกข้อมูล (อยู่บนสุดเพื่อให้บันทึกเสร็จแล้วแสดงผลทันที)
if(isset($_POST['Submit'])){        //$_POST['Submit'] = ค่าที่มาจากปุ่ม <button name="Submit">
    $pname = $_POST['pname'];       //รับค่าจากฟอร์ม
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกลงฐานข้อมูล
    $sql_insert = "INSERT INTO provinces (p_id, p_name, p_ext, r_id) VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";        //สร้างคำสั่ง SQL เพิ่มข้อมูล
    mysqli_query($conn, $sql_insert) or die ("เพิ่มข้อมูลไม่ได้: " . mysqli_error($conn));        //สั่งรันคำสั่ง SQL
    $pid = mysqli_insert_id($conn);     // ดึง ID ล่าสุดเพื่อมาตั้งชื่อรูป
    

    move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);     // อัพโหลดรูปภาพไปที่โฟลเดอร์ images
//จบเงื่อนไข Submit
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>
<body>

<h1> งาน i -- จุฬาลักษณ์ ลมดา (พลอย) </h1>

<form method="post" action="" enctype="multipart/form-data" >       <!--ฟอร์มเพิ่มข้อมูล-->
    <!--ช่องกรอกชื่อจังหวัด-->
    ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    รูปภาพ <input type="file" name="pimage" required> <br>
    
    ภาค
    <select name="rid">
    <?php
    $sql_region = "SELECT * FROM regions";              //Dropdown เลือกภาค
    $rs_region = mysqli_query($conn, $sql_region);      
    while ($data_region = mysqli_fetch_array($rs_region)){      //ดึงข้อมูลจากตาราง regions
    ?>   
        <!--วนลูปทีละแถว-->
        <option value="<?php echo $data_region['r_id'] ; ?>"><?php echo $data_region['r_name'] ;?></option>
    <?php } ?>
    </select>
    <br><br>
    
    <button type="submit" name="Submit">บันทึก</button>       <!--ปุ่มบันทึก--> 
</form>
<br><hr><br>

<table border="1" cellpadding="5" cellspacing="0">      <!--ตารางแสดงข้อมูล-->
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
// แก้ไข SQL: เว้นวรรคตรง provinces AS p
$sql_show = "SELECT * FROM provinces AS p INNER JOIN regions AS r ON p.r_id = r.r_id ORDER BY p.p_id ASC";      //ดึงข้อมูลจังหวัด + ภาค
$rs_show = mysqli_query($conn, $sql_show);

while ($data = mysqli_fetch_array($rs_show)){
?>   
    <tr>
        <!--แสดงข้อมูลแต่ละช่อง-->
        <td align="center"><?php echo $data['p_id'] ; ?></td>
        <td><?php echo $data['p_name'] ;?></td>
        <td><?php echo $data['r_name'] ;?></td>
        
        <td align="center">
            <?php if($data['p_ext'] != "") { ?>     <!--แสดงรูปภาพ-->
                <img src="images/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="100">
            <?php } else { echo "ไม่มีรูป"; } ?>
        </td>
        
        <td align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext']; ?>" onClick="return confirm('ยืนยันการลบข้อมูลนี้?');">       <!--ปุ่มลบ-->
                <img src="images/Delete.jpg" width="30">
                
                </a>
        </td>
    </tr>
<?php } ?>      <!--ปิดลูป while-->
</table>

</body>
</html>
<?php mysqli_close($conn); ?>       <!--ปิดการเชื่อมต่อฐานข้อมูล-->