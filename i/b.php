<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>งาน i -- จุฬาลักษณ์ ลมดา (พลอย)</h1>

<form method="post" action="" >
	ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    รูป <input type="file" name="pimage" required><br>

    ภาค
    <select name="rid">
 <?php
include_once("connectdb.php");
$sql = "SELECT * FROM regions";
$rs = mysqli_query($conn, $sql);
 while ($data = mysqli_fetch_array($rs)){
?> 
        <option value="<?php echo $data['r_id'] ; ?>"><?php echo $data['r_name'] ;?></option>
<?php } ?>
    </select>




    <button type="submit" name="Submit">บันทึก</button>	
</form><br><br>

<?php
if(isset($_POST['Submit'])){
	include_once("connectdb.php");
	$pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimge']['name'],PATHINFO_EXTENSION);
    $rid = $_POST['rid'];


	$sql = "INSERT INTO provinces (p_id, p_name, p_ext, r_id) VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
	mysqli_query($conn, $sql) or die ("เพิ่มข้อมูลไม่ได้");
    $pid = mysqli_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'],"img/".$pid.".".$ext);
}
?>


<table border="1">
	<tr>
    	<th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM provinces";
$rs = mysqli_query($conn, $sql);
 while ($data = mysqli_fetch_array($rs)){
?>   
    <tr>
    	<td><?php echo $data['p_id'] ; ?></td>
        <td><?php echo $data['p_name'] ;?></td>
        <td width="80" align="center"><img src="img/<?php echo $data['p_id'] ; ?>.<?php echo $data['p_ext'] ; ?>" width="50"></a></td>
        <td width="80" align="center"><a href="delete_provinces.php?id=<?php echo $data['r_id']; ?>" onClick="return confirm('d1');"><img src="img/A.jpg" width="50"></a></td>
    </tr>
<?php } ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>