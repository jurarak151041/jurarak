<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดขาย - จุฬาลักษณ์ ลมดา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f4f7f6; padding-top: 30px; }
        .chart-container { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); height: 100%; }
        .table-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header-gradient { background: linear-gradient(45deg, #1a2a6c, #b21f1f, #fdbb2d); color: white; padding: 20px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-gradient rounded-top-4 mb-4">
        <h2 class="mb-0">📊 สรุปยอดขายตามประเทศ</h2>
        <p class="mb-0 opacity-75">จัดทำโดย: จุฬาลักษณ์ ลมดา (พลอย)</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-7">
            <div class="chart-container">
                <h5 class="text-center mb-3">ยอดขายรวมรายประเทศ (Bar Chart)</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="col-md-5">
            <div class="chart-container">
                <h5 class="text-center mb-3">สัดส่วนยอดขาย (Pie Chart)</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <div class="table-card mb-5">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="ps-4">ประเทศ</th>
                    <th class="text-end pe-4">ยอดขายรวม (บาท)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("connectdb.php");
                $sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country` ORDER BY total DESC";
                $rs = mysqli_query($conn, $sql);
                
                $labels = [];
                $data_values = [];
                
                while ($data = mysqli_fetch_array($rs)) {
                    $labels[] = $data['p_country'];
                    $data_values[] = $data['total'];
                ?>
                <tr>
                    <td class="ps-4 fw-bold text-secondary"><?php echo $data['p_country'];?></td>
                    <td class="text-end pe-4 fw-bold text-primary"><?php echo number_format($data['total'], 2);?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const ctxBar = document.getElementById('barChart');
    const ctxPie = document.getElementById('pieChart');
    const chartLabels = <?php echo json_encode($labels); ?>;
    const chartData = <?php echo json_encode($data_values); ?>;

    // การตั้งค่าสีแบบสุ่มให้กราฟ
    const colors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69'];

    // กราฟแท่ง
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'ยอดขายรวม',
                data: chartData,
                backgroundColor: colors,
                borderRadius: 5
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });

    // กราฟวงกลม
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: colors,
                hoverOffset: 10
            }]
        }
    });
</script>

</body>
</html>