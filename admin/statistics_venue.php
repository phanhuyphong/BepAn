<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    $sqlDoanhThu = "SELECT SUM(price) AS value_sum FROM users_orders
        WHERE status = 'closed' AND date BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($db, $sqlDoanhThu);
    $row = mysqli_fetch_assoc($result);
    $sumDoanhThu = $row['value_sum'];

    $sqlDonHang = "SELECT COUNT(*) as totalOrders
            FROM users_orders
        WHERE date BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($db, $sqlDonHang);
    $row = mysqli_fetch_assoc($result);
    $sumDonhang = $row['totalOrders'];

    $sqlDH_daThanhToan = "SELECT COUNT(*) as DHdone
            FROM users_orders
        WHERE status = 'closed' AND date BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($db, $sqlDH_daThanhToan);
    $row = mysqli_fetch_assoc($result);
    $sumDHdone = $row['DHdone'];

    $sumDHloading = $sumDonhang - $sumDHdone;
    $vietTam = "<p>Trong đó có $sumDHdone đã thanh toán thành công và $sumDHloading đơn hàng đang chờ xử lí!";
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Thống kê</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/koji.png" alt="homepage" class="dark-logo" style="width: 70px" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">

                    </ul>

                    <ul class="navbar-nav my-lg-0">


                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications
                                        </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);">
                                            <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Hệ thống quản lý</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user f-s-20 color-warning"></i><span class="hide-menu">Tài khoản</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_staff.php">Danh sách nhân viên
                                    </a></li>
                                <li><a href="all_users.php">Danh sách tài
                                        khoản</a></li>
                                <li><a href="add_users.php">Thêm tài khoản</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Danh mục</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Danh sách</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Món ăn</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Danh sách món ăn</a>
                                </li>
                                <li><a href="add_menu.php">Thêm món ăn</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn
                                    hàng</span></a></li>
                        <li> <a href="statistics_venue.php" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">thống kê</span></a>

                        </li>
                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">



            <div class="container-fluid">
                <!-- Start Page Content -->


                <?php echo $error;
                echo $success; ?>




                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white p-10 text-center align-items-center">
                                Thống kê doanh thu và đơn đật hàng</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form action="sales_statistics.php" method="post">
                                                <label for="startDate">Ngày bắt đầu:</label>
                                                <input type="date" id="startDate" name="startDate" <?php if (isset($_POST['startDate'])) echo 'value="' . $_POST['startDate'] . '"'; ?>>
                                                <br>
                                                <label for="endDate">Ngày kết thúc:</label>
                                                <input type="date" id="endDate" name="endDate" <?php if (isset($_POST['endDate'])) echo 'value="' . $_POST['endDate'] . '"'; ?>>
                                                <br>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Thống kê">
                                            </form>
                                        </div>
                                    </div>
                                    <br>


                                </div>
                            </form>
                        </div>
                        <?php echo "<p>Tổng doanh thu (đơn hàng đã thanh toán thành công): $sumDoanhThu đ</p><br>"; ?>
                        <?php echo "<p>Tổng số lượng đơn đặt: $sumDonhang</p><br>
                            $vietTam";
                        ?>


                    </div>

                </div>
            </div>
            <footer class="footer"> DHHTTT16A - TREE </footer>
        </div>
    </div>
    </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>