<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ใบสมัครงาน | TECHNOVATE CO., LTD.</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f4f5f7;
        font-family: 'Segoe UI', sans-serif;
        color: #333;
    }

    .card {
        border: none;
        border-radius: 16px;
    }

    .header {
        text-align: center;
        padding: 30px 20px;
        border-bottom: 1px solid #eee;
    }

    .header h1 {
        font-size: 1.6rem;
        margin-bottom: 5px;
    }

    .header p {
        color: #777;
        margin: 0;
    }

    .section {
        padding: 30px;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 10px;
    }

    .divider {
        border-top: 1px dashed #ddd;
    }

    .btn-submit {
        background-color: #111;
        color: #fff;
        border-radius: 30px;
        padding: 10px 28px;
        border: none;
    }

    .btn-submit:hover {
        background-color: #000;
    }

    .btn-soft {
        border-radius: 30px;
        padding: 10px 28px;
    }

    footer {
        text-align: center;
        font-size: 0.85rem;
        color: #888;
        margin-top: 25px;
    }
</style>
</head>

<body>

<div class="container mt-5 mb-5" style="max-width: 900px;">

    <div class="card shadow-sm">

        <!-- Header -->
        <div class="header">
            <h1>💼 ใบสมัครงานออนไลน์</h1>
            <p>บริษัท TECHNOVATE CO., LTD.</p>
        </div>

        <form method="post">

            <!-- Position -->
            <div class="section">
                <div class="section-title">📌 ตำแหน่งที่ต้องการสมัคร</div>

                <label>ตำแหน่งงาน <span class="text-danger">*</span></label>
                <select class="form-select" name="position" required>
                    <option value="" disabled selected>-- เลือกตำแหน่ง --</option>
                    <option value="Software Developer">💻 Software Developer</option>
                    <option value="Project Manager">📊 Project Manager</option>
                    <option value="UX/UI Designer">🎨 UX/UI Designer</option>
                    <option value="Digital Marketing Specialist">📢 Digital Marketing Specialist</option>
                    <option value="Human Resources Officer">👥 Human Resources Officer</option>
                </select>
            </div>

            <div class="divider"></div>

            <!-- Personal Info -->
            <div class="section">
                <div class="section-title">👤 ข้อมูลส่วนตัว</div>

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

                <label>🎂 วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="birthday" required>
            </div>

            <div class="divider"></div>

            <!-- Education -->
            <div class="section">
                <div class="section-title">🎓 การศึกษา & ประสบการณ์</div>

                <label>ระดับการศึกษาสูงสุด</label>
                <select class="form-select mb-3" name="education" required>
                    <option value="" disabled selected>-- เลือกวุฒิ --</option>
                    <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                    <option value="อนุปริญญา">อนุปริญญา / ปวส.</option>
                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                    <option value="ปริญญาโท">ปริญญาโท</option>
                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                </select>

                <label>🛠️ ทักษะ / ความสามารถพิเศษ</label>
                <textarea class="form-control mb-3" name="skills" rows="3"></textarea>

                <label>🏢 ประสบการณ์ทำงาน</label>
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
    echo "<script>alert('🎉 บันทึกข้อมูลสำเร็จ');</script>";
}
?>

            <!-- Buttons -->
            <div class="section text-center">
                <button type="submit" name="Submit" class="btn btn-submit me-2">✅ ยืนยันการสมัคร</button>
                <button type="reset" class="btn btn-outline-secondary btn-soft me-2">🔄 ล้างข้อมูล</button>
                <a href="next_page.html" class="btn btn-outline-dark btn-soft">➡️ ขั้นตอนถัดไป</a>
            </div>

        </form>
    </div>

    <footer>
        © 2026 TECHNOVATE CO., LTD. All rights reserved.
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
