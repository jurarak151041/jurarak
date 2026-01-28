<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ใบสมัครงาน | TECHNOVATE CO., LTD.</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #1c1c1c;
        font-family: 'Segoe UI', sans-serif;
        color: #e0e0e0;
    }

    .wrapper {
        max-width: 900px;
        margin: auto;
    }

    .card {
        background-color: #2a2a2a;
        border: none;
        border-radius: 14px;
    }

    .header {
        padding: 30px;
        border-bottom: 1px solid #3a3a3a;
        text-align: center;
    }

    .header h1 {
        font-size: 1.6rem;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .header p {
        color: #b0b0b0;
        margin: 0;
    }

    .section {
        padding: 30px;
        border-bottom: 1px solid #3a3a3a;
    }

    .section:last-child {
        border-bottom: none;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #ffffff;
        border-left: 4px solid #9e9e9e;
        padding-left: 10px;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        color: #d0d0d0;
    }

    .form-control,
    .form-select {
        background-color: #1f1f1f;
        border: 1px solid #444;
        color: #fff;
        border-radius: 8px;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #1f1f1f;
        color: #fff;
        border-color: #888;
        box-shadow: none;
    }

    .btn-main {
        background-color: #ffffff;
        color: #000;
        border-radius: 25px;
        padding: 10px 30px;
        border: none;
        font-weight: 600;
    }

    .btn-main:hover {
        background-color: #dcdcdc;
    }

    .btn-outline {
        border-radius: 25px;
        padding: 10px 30px;
        color: #ccc;
        border: 1px solid #666;
    }

    .btn-outline:hover {
        background-color: #3a3a3a;
        color: #fff;
    }

    footer {
        text-align: center;
        color: #888;
        font-size: 0.85rem;
        margin-top: 20px;
    }
</style>
</head>

<body>

<div class="container mt-5 mb-5 wrapper">

    <div class="card shadow-lg">

        <div class="header">
            <h1>ใบสมัครงานออนไลน์</h1>
            <p>TECHNOVATE CO., LTD.</p>
        </div>

        <form method="post">

            <!-- ตำแหน่งงาน -->
            <div class="section">
                <div class="section-title">ตำแหน่งที่ต้องการสมัคร</div>

                <label>ตำแหน่งงาน *</label>
                <select class="form-select" name="position" required>
                    <option value="" disabled selected>เลือกตำแหน่ง</option>
                    <option value="Software Developer">Software Developer</option>
                    <option value="Project Manager">Project Manager</option>
                    <option value="UX/UI Designer">UX/UI Designer</option>
                    <option value="Digital Marketing Specialist">Digital Marketing Specialist</option>
                    <option value="Human Resources Officer">Human Resources Officer</option>
                </select>
            </div>

            <!-- ข้อมูลส่วนตัว -->
            <div class="section">
                <div class="section-title">ข้อมูลส่วนตัว</div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>คำนำหน้า</label>
                        <select class="form-select" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label>ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                </div>

                <label>วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="birthday" required>
            </div>

            <!-- การศึกษา -->
            <div class="section">
                <div class="section-title">การศึกษาและประสบการณ์</div>

                <label>ระดับการศึกษาสูงสุด</label>
                <select class="form-select mb-3" name="education" required>
                    <option value="" disabled selected>เลือกวุฒิ</option>
                    <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                    <option value="อนุปริญญา">อนุปริญญา / ปวส.</option>
                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                    <option value="ปริญญาโท">ปริญญาโท</option>
                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                </select>

                <label>ทักษะ / ความสามารถพิเศษ</label>
                <textarea class="form-control mb-3" name="skills" rows="3"></textarea>

                <label>ประสบการณ์ทำงาน</label>
                <textarea class="form-control" name="experience" rows="4"></textarea>
            </div>

<?php
if (isset($_POST['Submit'])) {
    include_once("connectdb.php");

    $sql = "INSERT INTO application 
    (a_position, a_prefix, a_fullname, a_birthday, a_education, a_skills, a_experience)
    VALUES 
    ('{$_POST['position']}','{$_POST['prefix']}','{$_POST['fullname']}','{$_POST['birthday']}',
     '{$_POST['education']}','{$_POST['skills']}','{$_POST['experience']}')";

    mysqli_query($conn, $sql) or die("insert ไม่ได้");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
}
?>

            <!-- ปุ่ม -->
            <div class="section text-center">
                <button type="submit" name="Submit" class="btn btn-main me-2">ยืนยันการสมัคร</button>
                <button type="reset" class="btn btn-outline me-2">ล้างข้อมูล</button>
                <a href="next_page.html" class="btn btn-outline">ขั้นตอนถัดไป</a>
            </div>

        </form>

    </div>

    <footer>
        © 2026 TECHNOVATE CO., LTD.
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
