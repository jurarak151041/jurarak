<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>

<!-- Bootstrap 5.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">ฟอร์มรับข้อมูล - จุฬาลักษณ์ ลมดา (พลอย)</h3>
        </div>

        <div class="card-body">

            <form method="post" action="">

                <!-- Fullname -->
                <div class="mb-3">
                    <label class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" name="fullname" class="form-control" required autofocus>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label">เบอร์โทร</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <!-- Height -->
                <div class="mb-3">
                    <label class="form-label">ส่วนสูง (ซม.)</label>
                    <input type="number" name="height" min="100" max="200" class="form-control" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">ที่อยู่</label>
                    <textarea name="address" cols="40" rows="4" class="form-control"></textarea>
                </div>

                <!-- Birthday -->
                <div class="mb-3">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <!-- Color -->
                <div class="mb-3">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color">
                </div>

                <!-- Major -->
                <div class="mb-3">
                    <label class="form-label">สาขาวิชา</label>
                    <select name="major" class="form-select">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button type="submit" name="Submit" class="btn btn-success">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>

                    <button type="button" class="btn btn-warning"
                        onClick="window.location='https://www.youtube.com/watch?v=wJex6piMxKA&list=RDwJex6piMxKA&start_radio=1';">
                        Go to MSU
                    </button>

                    <button type="button" class="btn btn-info text-white"
                        onMouseOver="alert('!!!');">
                        Hello
                    </button>

                    <button type="button" class="btn btn-dark" onClick="window.print();">
                        พิมพ์
                    </button>
                </div>

            </form>

            <hr>

            <!-- Display Submitted Data -->
            <?php
            if (isset($_POST['Submit'])) {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $height = $_POST['height'];
                $address = $_POST['address'];
                $birthday = $_POST['birthday'];
                $color = $_POST['color'];
                $major = $_POST['major'];

                echo "<div class='alert alert-primary mt-3'><h5>ข้อมูลที่ส่งมา:</h5>";
                echo "ชื่อ-นามสกุล: $fullname<br>";
                echo "เบอร์โทร: $phone<br>";
                echo "ส่วนสูง: $height ซม.<br>";
                echo "ที่อยู่: $address<br>";
                echo "วันเดือนปีเกิด: $birthday<br>";
                echo "สีที่ชอบ: <div style='background-color:{$color}; width:300px; height:30px;' class='border'></div>";
                echo "สาขาวิชา: $major<br>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
