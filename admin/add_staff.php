<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (
        empty($_POST['staff_id'])||
        empty($_POST['username']) ||
        empty($_POST['staffname']) ||
        empty($_POST['email']) ||
        empty($_POST['password']) ||
        empty($_POST['phone']) ||
        empty($_POST['gender'])||
        empty($_POST['role'])
    ) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
    } else {
        // $check_staffid = mysqli_query($db, "SELECT staff_id FROM staff where staff_id = '".$_POST['staff_id']."'");
        $check_username = mysqli_query($db, "SELECT username FROM staff where username = '" . $_POST['username'] . "' ");
        $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");




        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
        } elseif (strlen($_POST['password']) < 6) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
        } elseif (strlen($_POST['phone']) < 10) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
        } elseif (mysqli_num_rows($check_username) > 0) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Username already exist!</strong>
															</div>';
        } elseif (mysqli_num_rows($check_email) > 0) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>email already exist!</strong>
															</div>';
        } elseif(mysqli_num_rows($check_staffid) > 0){
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>staff id already exist!</strong>
                                                            </div>';
        }
        
        else {

            $mql = "INSERT INTO staff(username, password, email, role, staff_name, gender, phone) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['email']."','".$_POST['role']."','".$_POST['staffname']."','".$_POST['gender']."', '".$_POST['phone']."')";
            mysqli_query($db, $mql);
            $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Congrass!</strong> New User Added Successfully.</br></div>';
        }
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add Staff</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none"
                stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/koji.png" alt="homepage"
                                class="dark-logo" style="width: 70px" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">

                    </ul>

                    <ul class="navbar-nav my-lg-0">


                        <li class="nav-item dropdown">

                            <div
                                class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications
                                        </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center"
                                            href="javascript:void(0);">
                                            <strong>Check all
                                                notifications</strong> <i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  "
                                href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img
                                    src="images/bookingSystem/user-icn.png"
                                    alt="user" class="profile-pic" /></a>
                            <div
                                class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i
                                                class="fa fa-power-off"></i>
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
                        <li> <a href="dashboard.php"><i
                                    class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Hệ thống quản lý</li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i
                                    class="fa fa-user f-s-20 color-warning"></i><span
                                    class="hide-menu">Tài khoản</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="all_staff.php">Danh sách nhân viên
                                        </a></li>
                                <li><a href="add_staff.php">Thêm nhân viên</a>
                                <li><a href="all_users.php">Danh sách tài
                                        khoản</a></li>
                                <li><a href="add_users.php">Thêm tài khoản</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i
                                    class="fa fa-archive f-s-20 color-warning"></i><span
                                    class="hide-menu">Danh mục</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Danh sách</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#"
                                aria-expanded="false"><i class="fa fa-cutlery"
                                    aria-hidden="true"></i><span
                                    class="hide-menu">Món ăn</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Danh sách món ăn</a>
                                </li>
                                <li><a href="add_menu.php">Thêm món ăn</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i
                                    class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Đơn
                                    hàng</span></a></li>

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
                            <h4
                                class="m-b-0 text-white p-10 text-center align-items-center">
                                Add Staff</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post'
                                enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Mã nhân viên
                                                    </label>
                                                <input type="text" name="staff_id"
                                                    class="form-control"
                                                    placeholder="ID">
                                            </div>
                                        </div> -->
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên
                                                    tài khoản</label>
                                                <input type="text" name="username"
                                                    class="form-control"
                                                    placeholder="username">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label
                                                    class="control-label">Tên nhân viên</label>
                                                <input type="text" name="staffname"
                                                    class="form-control form-control-danger"
                                                    placeholder="jon">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label
                                                    class="control-label">Email</label>
                                                <input type="text" name="email"
                                                    class="form-control form-control-danger"
                                                    placeholder="example@gmail.com">
                                            </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    class="control-label">Password</label>
                                                <input type="password"
                                                    name="password"
                                                    class="form-control form-control-danger"
                                                    placeholder="password">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Số
                                                    Điện Thoại</label>
                                                <input type="text" name="phone"
                                                    class="form-control form-control-danger"
                                                    placeholder="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="control-label">Giới tính
                                                    </label>
                                                <select name="gender" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="nam">nam</option>
                                                    <option value="nữ">nữ</option>
                                                </select>
                                            </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Chọn
                                                    chức vụ</label>
                                                <select name="role" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="nvpv">nvpv</option>
                                                    <option value="nvb">nvb</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit"
                                class="btn btn-primary" value="Save">
                            <a href="add_staff.php"
                                class="btn btn-inverse">Cancel</a>
                        </div>
                        </form>
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