<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E.php - ฟอร์มรับสมัครงาน | TECHNOVATE CO., LTD.</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    /* สไตล์เพิ่มเติม */
    .section-title {
        color: #007bff; /* สีฟ้า */
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
        margin-bottom: 20px;
        font-weight: bold;
    }
</style>
</head>

<body>
<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-primary">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="h3 mb-0">💼 ใบสมัครงานออนไลน์ บริษัท TECHNOVATE จำกัด</h1>
            <p class="mb-0">กรุณากรอกข้อมูลให้ครบถ้วนเพื่อพิจารณา</p>
        </div>
        <div class="card-body">
                        <form method="post" action="f.php">
                
                <h4 class="section-title">1. ตำแหน่งที่ต้องการสมัคร</h4>
                <div class="mb-4">
                    <label for="position" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                    <select class="form-select" id="position" name="position" required>
                        <option value="" selected disabled>-- เลือกตำแหน่งงาน --</option>
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
                        <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                        <select class="form-select" id="prefix" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    
                    <div class="col-md-9 mb-3">
                        <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" autofocus required placeholder="ชื่อจริง นามสกุล">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="birthday" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </div>

                <h4 class="section-title mt-4">3. ประวัติการศึกษาและทักษะ</h4>
                
                <div class="mb-3">
                    <label for="education" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                    <select class="form-select" id="education" name="education" required>
                        <option value="" selected disabled>-- เลือกวุฒิการศึกษา --</option>
                        <option value="มัธยมศึกษา">มัธยมศึกษา หรือเทียบเท่า</option>
                        <option value="อนุปริญญา">อนุปริญญา / ปวส.</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="skills" class="form-label">ความสามารถพิเศษ / ทักษะ (เช่น ภาษาต่างประเทศ, โปรแกรม)</label>
                    <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="ระบุทักษะที่โดดเด่น เช่น TOEIC 800, Python, Adobe Suite"></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="experience" class="form-label">ประสบการณ์ทำงาน (โปรดระบุโดยย่อ)</label>
                    <textarea class="form-control" id="experience" name="experience" rows="5" placeholder="ระบุตำแหน่งงาน, บริษัท, และหน้าที่ความรับผิดชอบโดยย่อ"></textarea>
                </div>

                <div class="d-grid gap-2 d-md-block text-center pt-3 border-top">
                                        <button type="submit" name="Submit" class="btn btn-success btn-lg me-2">✅ ยืนยันการสมัคร</button>
                    <button type="reset" class="btn btn-outline-danger btn-lg me-2">❌ ยกเลิก</button>
                                        <a href="next_page.html" class="btn btn-info btn-lg text-white" role="button">➡️ ขั้นตอนถัดไป</a>
                </div>

            </form>
        </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>