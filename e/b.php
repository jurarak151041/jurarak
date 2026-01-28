<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ใบสมัครงาน | TECHNOVATE CO., LTD.</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f1f7ff;
        font-family: 'Segoe UI', sans-serif;
        color: #333;
    }

    .page-header {
        background-color: #0d6efd;
        color: white;
        padding: 30px 20px;
        border-radius: 12px 12px 0 0;
        text-align: center;
    }

    .page-header span {
        color: #ffc107;
        font-weight: bold;
    }

    .card {
        border: none;
        border-radius: 12px;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0d6efd;
        border-bottom: 3px solid #ffc107;
        display: inline-block;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    .btn-submit {
        background-color: #0d6efd;
        color: white;
        border-radius: 25px;
        padding: 10px 30px;
        border: none;
    }

    .btn-submit:hover {
        background-color: #0b5ed7;
    }

    .btn-reset {
        border-radius: 25px;
        padding: 10px 30px;
    }

    .btn-next {
        background-color: #ffc107;
        color: #000;
        border-radius: 25px;
        padding: 10px 30px;
        border: none;
    }

    .btn-next:hover {
        background-color: #e0a800;
        color: #000;
    }

    footer {
        text-align: center;
        font-size: 0.9rem;
        color: #666;
        margin-top: 25px;
    }
</style>
</head>

<body>

<div class="container mt-5 mb-5">
    <div class="card shadow-sm">

        <div class="page-header">
            <h1 class="h4 mb-1">ใบสมัครงานออนไลน์</h1>
            <p class="mb-0">บริษัท <span>TECHNOVATE CO., LTD.</span></p>
        </div>

        <div class="card-body p-4">

            <form method="post">

                <h4 class="section-title">ตำแหน่งที่ต้องการสมัคร</h4>
                <div class="mb-4">
                    <label>ตำแหน่งงาน <span class="text-danger">*</span></label>
                    <select class="form-select" name="position" required>
                        <option value="" disabled selected>-- เลือกตำแหน่ง --</option>
                        <option value="Software Developer">Software Developer</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="UX/UI Designer">UX/UI Designer</option>
                        <option value="Digital Marketing Specialist">Digital Marketing Specialist</option>
                        <option value="Human Resources Officer">Human Resources Officer</option>
                    </select>
                </div>

                <h4 class="section-title">ข้อมูลส่วนตัว</h4>

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

                <div class="mb-4">
                    <label>วันเดือนปีเกิด</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>

                <h4 class="section-title">การศึกษาและประสบการณ์</h4>

                <div class="mb-3">
                    <label>ระดับการศึกษาสูงสุด</label>
                    <select class="form-select" name="education" required>
                        <option value="" disabled selected>-- เลือกวุฒิ --</option>
                        <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                        <option value="อนุปริญญา">อนุปริญญา / ปวส.</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>ทักษะ / ความสามารถพิเศษ</label>
                    <textarea class="form-control" name="skills" rows="3"></textarea>
                </div>

                <div class="mb-4">
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

                <div class="text-center pt-4 border-top">
                    <button type="submit" name="Submit" class="btn btn-submit me-2">ยืนยันการสมัคร</button>
                    <button type="reset" class="btn btn-outline-secondary btn-reset me-2">ล้างข้อมูล</button>
                    <a href="next_page.html" class="btn btn-next">ขั้นตอนถัดไป</a>
                </div>

            </form>

        </div>
    </div>

    <footer>
        © 2026 TECHNOVATE CO., LTD. All rights reserved.
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
