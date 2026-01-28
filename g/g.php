<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monthly Sales - จุฬาลักษณ์ ลมดา</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f8f9fa; padding: 25px; }
        
        /* เปลี่ยนเป็นโทนน้ำเงิน-เหลือง */
        .header-box { 
            background: linear-gradient(135deg, #002d72 0%, #0056b3 100%); 
            color: #ffca28; /* สีเหลืองทอง */
            border-radius: 15px; 
            padding: 30px; 
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,45,114,0.2);
            border-bottom: 5px solid #ffca28;
        }
        
        .dashboard-card { 
            background: white; 
            border-radius: 15px; 
            border: 1px solid #e0e0e0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            height: 100%;
        }

        .table thead { 
            background-color: #002d72; 
            color: #ffca28; 
        }

        .text-custom-blue { color: #002d72; }
        .text-custom-gold { color: #ffca28; }
        
        canvas { max-height: 280px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-box text-center">
        <h2 class="fw-bold mb-1">📊 MONTHLY SALES REPORT</h2>
        <p class="mb-0 text-white opacity-75">ผู้ดูแลระบบ: คุณจุฬาลักษณ์ ลมดา (พลอย)</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card p-4">
                <h6 class="fw-bold text-custom-blue mb-3"><i class="fas fa-chart-bar me-2"></i>แนวโน้มยอดขาย</h6>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card p-4">
                <h6 class="fw-bold text-custom-blue mb-3"><i class="fas fa-chart-pie me-2"></i>สัดส่วนรายเดือน</h6>
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="dashboard-card overflow-hidden">
                <div class="p-3 bg-light border-bottom border-warning border-3">
                    <h6 class="mb-0 fw-bold text-custom-blue">ข้อมูลสรุปยอดขาย</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">เดือน</th>
                                <th class="text-end pe-4">ยอดขาย (฿)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once("connectdb.php");
                            $sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales 
                                    FROM popsupermarket 
                                    GROUP BY MONTH(p_date) 
                                    ORDER BY Month";
                            $rs = mysqli_query($conn, $sql);
                            
                            $months = [];
                            $sales = [];
                            $monthNames = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

                            while ($data = mysqli_fetch_array($rs)) {
                                $months[] = $monthNames[$data['Month']];
                                $sales[] = $data['Total_Sales'];
                            ?>
                            <tr>
                                <td class="ps-4">เดือนที่ <?php echo $data['Month'];?> (<?php echo $monthNames[$data['Month']]; ?>)</td>
                                <td class="text-end pe-4 fw-bold text-custom-blue"><?php echo number_format($data['Total_Sales'], 0);?></td>
                            </tr>
                            <?php } mysqli_close($conn); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const labels = <?php echo json_encode($months); ?>;
    const dataValues = <?php echo json_encode($sales); ?>;
    
    // โทนสีน้ำเงินสลับเหลือง
    const themeColors = [
        '#002d72', '#ffca28', '#0056b3', '#ffd54f', '#003d91', 
        '#ffb300', '#1e88e5', '#ffeb3b', '#1565c0', '#fbc02d'
    ];

    // กราฟแท่ง (ใช้สีน้ำเงินขอบเหลือง)
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขาย',
                data: dataValues,
                backgroundColor: '#002d72',
                borderColor: '#ffca28',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: { 
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // กราฟโดนัท (สลับสีน้ำเงินเหลือง)
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: themeColors,
                hoverOffset: 20
            }]
        },
        options: { 
            responsive: true,
            cutout: '65%',
            plugins: { 
                legend: { 
                    position: 'bottom',
                    labels: { boxWidth: 12, font: { size: 11 } }
                } 
            }
        }
    });
</script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>