<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จุฬาลักษณ์ ลมดา (พลอย) - Supermarket Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        
        .main-card {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden; /* เพื่อให้มุมโค้งตัดส่วนสีหัวตาราง */
        }

        .header-section {
            background: linear-gradient(45deg, #4e73df, #224abe);
            color: white;
            padding: 30px;
            text-align: center;
        }

        /* ตกแต่งตาราง */
        .table thead {
            background: #4e73df;
            color: white;
        }

        .table thead th {
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            padding: 15px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        /* ปรับแต่ง Search Box */
        .dataTables_filter input {
            border: 2px solid #e3e6f0;
            border-radius: 10px;
            padding: 8px 15px;
            margin-left: 10px;
            transition: all 0.3s;
        }

        .dataTables_filter input:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
            outline: none;
        }

        /* รูปภาพสินค้า */
        .img-product {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .badge-category {
            background: #eef2ff;
            color: #4e73df;
            border: 1px solid #c7d2fe;
            font-weight: 500;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="main-card">
        <div class="header-section">
            <h2 class="mb-1"><i class="fas fa-store-alt me-2"></i> Pop Supermarket Inventory</h2>
            <p class="mb-0 opacity-75">ผู้ดูแลระบบ: คุณจุฬาลักษณ์ ลมดา (พลอย)</p>
        </div>

        <div class="p-4">
            <table id="premiumTable" class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th><i class="fas fa-shopping-basket me-2"></i>ชื่อสินค้า</th>
                        <th><i class="fas fa-tags me-2"></i>ประเภท</th>
                        <th><i class="fas fa-calendar-alt me-2"></i>วันที่</th>
                        <th><i class="fas fa-globe me-2"></i>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("connectdb.php");
                    $sql = "SELECT * FROM `popsupermarket`";
                    $rs = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($rs)) {
                    ?>
                    <tr>
                        <td class="text-center text-muted small">#<?php echo $data['p_order_id']; ?></td>
                        <td class="fw-bold text-dark"><?php echo $data['p_product_name']; ?></td>
                        <td><span class="badge badge-category"><?php echo $data['p_category']; ?></span></td>
                        <td><?php echo date('d M Y', strtotime($data['p_date'])); ?></td>
                        <td><i class="fas fa-map-marker-alt text-danger me-1"></i> <?php echo $data['p_country']; ?></td>
                        <td class="text-end fw-bold text-primary" style="font-size: 1.1rem;">
                            <?php echo number_format($data['p_amount'], 2); ?>
                        </td>
                        <td class="text-center">
                            <img src="img/<?php echo $data['p_product_name']; ?>.jpg" class="img-product">
                        </td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#premiumTable').DataTable({
            "language": {
                "search": "<span class='fw-bold text-primary'><i class='fas fa-search'></i> ค้นหาแบบด่วน:</span>",
                "lengthMenu": "แสดง _MENU_ รายการ",
                "info": "พบทั้งหมด _TOTAL_ รายการ",
                "paginate": {
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            },
            "dom": '<"d-flex justify-content-between align-items-center mb-3"lf>rt<"d-flex justify-content-between align-items-center mt-3"ip>'
        });
    });
</script>

</body>
</html>