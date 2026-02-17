<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>งาน i -- จุฬาลักษณ์ ลมดา (พลอย)</h1>

<form method="post" action="" enctype="multipart/form-data">
	ชื่อจังหวัด <input type="text" name="pname" autofocus required>
    รูป <input type="file" name="pimag" required><br>

    ภาค
    <select name="rid">
    <?php
include_once("connectdb.php");
$sql3 = "SELECT * FROM regions";
$rs3 = mysqli_query($conn, $sql3);
 while ($data3 = mysqli_fetch_array($rs3)){
?>   
        <option value="<?php echo $data3['r_id']; ?>">xxx</option>
<?php}?>
</select>
<br>

    <button type="submit" name="Submit">บันทึก</button>
</form><br><br>

<?php
if(isset($_POST['Submit'])){
	include_once("connectdb.php");
    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];

	$sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}','{$ext}','{$rname}')";
	mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่ได้");
    $pid = mysql_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'],"imges/".$pid.".".);
}
?>


<table border="1">
	<tr>
    	<th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `provinces` ";
$rs = mysqli_query($conn, $sql);
 while ($data = mysqli_fetch_array($rs)){
?>   
    <tr>
    	<td><?php echo $data['r_id'] ; ?></td>
        <td><?php echo $data['r_name'] ;?></td>
        <td><img src="images/<?php echo $data['p_id'] ;?>.jpg" width="140"></td>
        <td width="80" align="center"><a href="delete_region.php?id=<?php echo $data['r_id'] ; ?>" onClick="return confirm('ยืนยันการลบ?')"><img src="images/Delete.jpg" width="20"></td>
    </tr>
<?php } ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>