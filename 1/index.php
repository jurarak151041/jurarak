<?php
include_once("connectdb.php"); 
// เรียกไฟล์เชื่อม database

/* ================= INSERT ================= */
if(isset($_POST['Submit'])){  
// ตรวจว่ามีการกดปุ่ม Submit หรือยัง

    $pname = $_POST['pname'];  
    // รับชื่อสินค้า

    $price = $_POST['price'];  
    // รับราคาสินค้า

    $stock = $_POST['stock'];  
    // รับจำนวนสินค้า

    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);  
    // ดึงนามสกุลไฟล์รูป (เช่น jpg, png)

    $sql_insert = "INSERT INTO products 
    (p_id, p_name, p_price, p_stock, p_ext) 
    VALUES (NULL, '{$pname}', '{$price}', '{$stock}', '{$ext}')";
    // คำสั่ง SQL เพิ่มข้อมูลสินค้า

    mysqli_query($conn, $sql_insert) 
    or die ("เพิ่มข้อมูลไม่ได้: " . mysqli_error($conn));
    // รัน SQL ถ้าผิดพลาดให้แสดง error

    $pid = mysqli_insert_id($conn);  
    // ดึง id ล่าสุดที่เพิ่ง insert เข้าไป

    move_uploaded_file(
        $_FILES['pimage']['tmp_name'], 
        "images/".$pid.".".$ext
    );
    // ย้ายไฟล์รูปจาก temp ไปเก็บในโฟลเดอร์ images
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mini Shop</title>
</head>

<body>

<h1>มินิร้านค้า (Mini Shop)</h1>

<!-- ===== ฟอร์มเพิ่มสินค้า ===== -->
<form method="post" action="" enctype="multipart/form-data">
    ชื่อสินค้า 
    <input type="text" name="pname" autofocus required><br>

    ราคา 
    <input type="number" name="price" required><br>

    จำนวน 
    <input type="number" name="stock" required><br>

    รูปสินค้า 
    <input type="file" name="pimage" required><br><br>

    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><hr><br>

<!-- ===== ตารางแสดงสินค้า ===== -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>รหัส</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>คงเหลือ</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>

<?php
$sql_show = "SELECT * FROM products ORDER BY p_id ASC";
// คำสั่ง SQL ดึงข้อมูลสินค้า

$rs_show = mysqli_query($conn, $sql_show);
// รัน SQL

while ($data = mysqli_fetch_array($rs_show)){
// วนลูปดึงข้อมูลทีละแถว
?>   
    <tr>
        <td align="center"><?php echo $data['p_id']; ?></td>
        <!-- แสดงรหัส -->

        <td><?php echo $data['p_name']; ?></td>
        <!-- แสดงชื่อ -->

        <td><?php echo $data['p_price']; ?></td>
        <!-- แสดงราคา -->

        <td><?php echo $data['p_stock']; ?></td>
        <!-- แสดงจำนวน -->

        <td align="center">
            <?php if($data['p_ext'] != "") { ?>
                <img src="images/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="100">
            <?php } else { echo "ไม่มีรูป"; } ?>
        </td>
        <!-- แสดงรูปสินค้า -->

        <td align="center">
            <a href="delete_product.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext']; ?>"
               onClick="return confirm('ยืนยันการลบข้อมูลนี้?');">
                ลบ
            </a>
        </td>
        <!-- ปุ่มลบ -->
    </tr>
<?php } ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
<!-- ปิดการเชื่อมต่อ database -->