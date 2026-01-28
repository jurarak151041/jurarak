<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>F.php - ผลลัพธ์ใบสมัครงาน</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-success">
        <div class="card-header bg-success text-white text-center">
            <h1 class="h3 mb-0">✅ ผลลัพธ์การส่งใบสมัครงาน</h1>
            <p class="mb-0">ข้อมูลที่คุณกรอกสำหรับบริษัท TECHNOVATE จำกัด</p>
        </div>
        <div class="card-body">

<?php
// ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม e.php
    $position = isset($_POST['position']) ? $_POST['position'] : 'ไม่ได้ระบุ';
    $prefix = isset($_POST['prefix']) ? $_POST['prefix'] : '';
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : 'ไม่ได้ระบุ';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : 'ไม่ได้ระบุ';
    $education = isset($_POST['education']) ? $_POST['education'] : 'ไม่ได้ระบุ';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';

    // แสดงผลลัพธ์ในรูปแบบ Card และ List Group ที่สวยงาม
?>
    <h4 class="text-success mb-3">🎉 ข้อมูลใบสมัครที่ส่งเรียบร้อยแล้ว</h4>
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-info">
            <strong>ตำแหน่งที่สมัคร:</strong> 
            <span class="float-end fw-bold"><?php echo htmlspecialchars($position); ?></span>
        </li>
        <li class="list-group-item">
            <strong>ชื่อ-นามสกุล:</strong> 
            <span class="float-end"><?php echo htmlspecialchars($prefix) . " " . htmlspecialchars($fullname); ?></span>
        </li>
        <li class="list-group-item">
            <strong>วันเดือนปีเกิด:</strong> 
            <span class="float-end"><?php echo htmlspecialchars($birthday); ?></span>
        </li>
        <li class="list-group-item">
            <strong>ระดับการศึกษาสูงสุด:</strong> 
            <span class="float-end"><?php echo htmlspecialchars($education); ?></span>
        </li>
        <li class="list-group-item">
            <strong>ความสามารถพิเศษ:</strong> <br>
            <pre class="bg-light p-2 rounded"><?php echo empty($skills) ? "ไม่ได้ระบุ" : htmlspecialchars($skills); ?></pre>
        </li>
        <li class="list-group-item">
            <strong>ประสบการณ์ทำงาน:</strong> <br>
            <pre class="bg-light p-2 rounded"><?php echo empty($experience) ? "ไม่ได้ระบุ" : htmlspecialchars($experience); ?></pre>
        </li>
    </ul>
    <div class="mt-4 text-center">
        <a href="e.php" class="btn btn-secondary">ย้อนกลับไปยังฟอร์ม</a>
    </div>

<?php
} else {
    // กรณีเข้าถึงไฟล์ f.php โดยตรงโดยไม่มีการส่งฟอร์ม
    echo '<div class="alert alert-danger">❌ กรุณากรอกข้อมูลในฟอร์มสมัครงานก่อน (ไฟล์ e.php)</div>';
    echo '<div class="text-center"><a href="e.php" class="btn btn-primary">กลับไปที่ฟอร์ม</a></div>';
}
?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>