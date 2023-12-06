<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt món</title>
</head>
<?php
    include("connection/connect.php");
    error_reporting(0);
    session_start();
?>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
<body>
     <!--header starts-->
     <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button"
                    data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img
                        class="img-rounded" src="images/koji.png" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right"
                    id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active"
                                href="index.php">Trang Chủ <span
                                    class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active"
                                href="restaurants.php">Thực đơn trong ngày<span
                                    class="sr-only"></span></a> </li>


                        <?php
                    if(empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng Nhập</a> </li>';
                    }
                else
                    {
                            //if user is login
                            
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn Đặt</a> </li>';
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> '.$_SESSION["username"].'</a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user" style="
                                background-color: white !important;">
                                <li> <a class="dropdown-item" href="change_password.php"><i class="fa fa-gear"></i> Đổi mật khẩu</a> </li>
                                <li> <a class="dropdown-item" href="Logout.php"><i class="fa fa-power-off"></i> Đăng Xuất </a> </li>
                                
                                </ul>
                            </div>
                          </li>';
                    }

                    ?>

                    </ul>

                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active">
                        <span>1</span><a href="restaurants.php">Chọn Món ăn</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a
                            href="#">Đặt món ăn yêu thích của bạn</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a
                            href="#">Nhận món ăn và thanh toán</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image"
            data-image-src="images/img/res.jpeg">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <!-- //results show -->
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">


                        <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Popular tags
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                    <li> <a href="#" class="tag">
                                            Pizza
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Sendwich
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Sendwich
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Fish
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Desert
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Salad
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end:Widget -->
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php $ress = mysqli_query($db, "select * from restaurant");
while ($rows = mysqli_fetch_array($ress))
{

    echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> 
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																		<p> 245 Reviews</p> <a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn theme-btn-dash">Xem Thực Đơn</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
}

?>
                            </div>
                            <!--end:row -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- start FOOTER -->
    <footer class="footer">
        <div class="container">
            <!-- top footer starts -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"><img src="images/koji.png" alt="Footer logo" class="img-footer"></img></a>
                    <span>Địa chỉ Giờ hoạt động &amp; Theo dõi chúng tôi</span>
                </div>
                <div class="col-xs-12 col-sm-2 about color-gray">
                    <h5>Địa chỉ</h5>
                    <ul>
                        <li><a href="#">No.12 Nguyen Van Bảo Street</a></li>
                        <li><a href="#">Email: nguyenan@gmail.com</a></li>
                        <li><a href="#">Phone: 0909090090</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 pages color-gray">
                    <h5>Giờ hoạt động</h5>
                    <ul>
                        <li><a href="#">07:30 - 01:30PM</a> </li>
                        <li><a href="#">Monday - Friday</a> </li>
                    </ul>  
                </div>
                <div class="col-xs-12 col-sm-2 pages color-gray">
                    <h5>Theo dõi chúng tôi</h5>
                    <a style="color:white; font-size:30px" href=""><i class="fa-brands fa-facebook"></i></a> &nbsp;
                    <a style="color:white; font-size:30px;" href=""><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="col-xs-12 col-sm-2 about color-gray">
                    <h5>Chính sách</h5>
                    <ul>
                        <li><a href="#">Chính sách đền bù</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>