<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ใบสมัครงาน | TECHNOVATE CO., LTD.</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #0d1b3f, #1e3c72);
        font-family: 'Segoe UI', sans-serif;
    }

    .card {
        border-radius: 16px;
        overflow: hidden;
        border: none;
    }

    .card-header {
        background: linear-gradient(90deg, #003366, #0056b3);
        color: #fff;
    }

    .section-title {
        color: #003366;
        border-left: 6px solid #ffc107;
        padding-left: 12px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    label {
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .btn-success {
        background: linear-gradient(90deg, #28a745, #5fd068);
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
    }

    .btn-outline-danger {
        border-radius: 30px;
        padding: 10px 25px;
    }

    .btn-info {
        background: linear-gradient(90deg, #ffc107, #ffdd57);
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
    }

    .btn-info:hover {
        background: #ffca2c;
    }

    footer {
        text-align: center;
        color: #fff;
        font-size: 0.9rem;
        margin-top: 30px;
    }
</style>
</head>

<body>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-header text-center py-4">
            <h1 class="h3 mb-1">💼 ใบสมัครงานออนไลน์</h1>
            <p class="mb-0">บริษัท TECHNOVATE CO., LTD.</p>
        </div>

        <div class="card-body p-4">

            <form method="post">

                <h4 class="section-title">1. ตำแหน่งที่ต้องการสมัคร</h4>
                <div class="mb-4">
                    <label class="form-label">ตำแหน่งงาน <span class="text-danger">*</span></label>
                    <select class="form-select" name="position" required>
                        <option value="" disabled selected>-- เลือกตำแหน่ง --</option>
                        <option value="Software Developer">💻 Software Developer</option>
                        <option value="Project Manager">📈 Project Manager</option>
                        <option value="UX/UI Designer">🎨 UX/UI Designer</option>
                        <option value="Digital Marketing Specialist">📢 Digital Marketing Specialist</option>
                        <option value="Human Resources Officer">👥 Human Resources Officer</option>
                    </select>
                </div>

                <h4 class="section-title">2. ข้อมูลส่วนตัว</h4>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">คำนำหน้า</label>
                        <select class="form-select" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>

                <h4 class="section-title mt-4">3. การศึกษาและประสบการณ์</h4>

                <div class="mb-3">
                    <label class="form-label">ระดับการศึกษาสูงสุด</label>
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
                    <label class="form-label">ทักษะ / ความสามารถพิเศษ</label>
                    <textarea class="form-control" name="skills" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">ประสบการณ์ทำงาน</label>
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
                    <button type="submit" name="Submit" class="btn btn-success btn-lg me-2">✅ ยืนยันการสมัคร</button>
                    <button type="reset" class="btn btn-outline-danger btn-lg me-2">❌ ล้างข้อมูล</button>
                    <a href="next_page.html" class="btn btn-info btn-lg text-white">➡️ ขั้นตอนถัดไป</a>
                </div>

            </form>

        </div>
    </div>

    <footer class="mt-4">
        © 2026 TECHNOVATE CO., LTD. | All Rights Reserved
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
