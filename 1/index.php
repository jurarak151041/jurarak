<?php
include 'db.php';
// เชื่อม database

// คำสั่ง SQL ดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM users";

// ส่งคำสั่งไป query
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ระบบจัดการผู้ใช้</title>
</head>
<body>

<h2>ฟอร์มเพิ่มข้อมูล</h2>

<!-- ฟอร์มส่งข้อมูลไป insert.php -->
<form action="insert.php" method="post">

    <!-- ช่องกรอกชื่อ -->
    <input type="text" name="name" placeholder="ชื่อ" required>

    <!-- ช่องกรอกอีเมล -->
    <input type="email" name="email" placeholder="อีเมล" required>

    <!-- ปุ่มบันทึก -->
    <button type="submit">บันทึก</button>

</form>

<hr>

<h2>ข้อมูลในระบบ</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php
// วนลูปแสดงข้อมูลทีละแถว
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <!-- แสดง id -->
    <td><?php echo $row['id']; ?></td>

    <!-- แสดง name -->
    <td><?php echo $row['name']; ?></td>

    <!-- แสดง email -->
    <td><?php echo $row['email']; ?></td>

    <!-- ปุ่มลบ -->
    <td>
        <a href="delete.php?id=<?php echo $row['id']; ?>">
            ลบ
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>