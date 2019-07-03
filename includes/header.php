
<header class="header-top-area bg-nero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7 hidden-xs">
                    <div class="header-content-left">
                        <ul class="header-top-menu">
                            <?php   if(strlen($_SESSION['login'])==0)
  { 
?>
    <div class="login-btn"> <a href="#loginform" class="top-left-menu" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 
?>
                            <li>
                                <a href="#" class="top-left-menu">                                    
                                    <span>Welcome To Car Rental Website</span>
                                </a>
                            </li>
                            <?php } ?>
                            
                        </ul>
                        <!-- /.header-top-menu -->
                    </div>
                    <!-- /.header-content-left -->
                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-6 col-sm-5">
                    <div class="header-content-right">
                        
                        <ul class="header-top-menu">                           
                            <li>
                                <a href="#" class="trigger-overlay">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.left-content -->
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>
    <!-- /.head-area -->

    <!-- ======= Header Modal Area =======-->
    <div class="header-modal-area">
        
        <div class="overlay-sidebar">
            <div class="author-area">
                <a href="#" class="closebtn">&times;</a>
                <div class="author-area-content">
                    <div class="login-author">
                        <div class="author-info">                            
                            <div class="author-des">
                                <h4 class="author-name">
<?php 
$email=$_SESSION['login'];
$sql ="SELECT c_name FROM customers WHERE c_email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
    {

     echo htmlentities($result->c_name); }}?></h4>                                
                            </div>
                            <!-- /.author-des -->
                        </div>
                        <!-- /.author-info -->
                        <div class="author-menu">
                            <ul class="yellow-color">
                                <?php if($_SESSION['login']){?>
                                <li><a href="profile.php"><i class="fa fa-user-circle-o"></i>My Profile</a></li>
                                <li><a href="my-booking.php"><i class="fa fa-location-arrow"></i>My Bookings</a></li>                           
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                                <?php } else { ?>
                                <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-user-circle-o"></i>Profile</a></li>
                                <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-envelope-open"></i>Booking</a></li>                                
                                <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- /.author-menu -->
                    </div>
                    <!-- /.login-author -->
                </div>
                <!-- /.author-area-content -->
            </div>
            <!-- /.author-area -->
        </div>
        <!-- /.overlay-sidebar -->
    </div>
    <!-- /.header-modal-area -->

    <!-- ====== Header Nav Area ====== -->
    <header class="header-nav-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-10 col-xs-10">
                    <div class="site-logo">
                        <a href="index.php"><img src="assets/images/car-logo.png" alt="logo" /></a>
                    </div>
                    <!-- /.logo -->
                </div>
                <!-- /.col-md-3 -->
                <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                    <nav class="site-navigation top-navigation nav-style-one">
                        <div class="menu-wrapper">
                            <div class="menu-content">
                                <ul class="menu-list">
                                    <li>
                                        <a href="index.php">Home</a>
                                        
                                    </li>
                                    <li>
                                        <a href="car-listing.php">Car Listing</a>
                                    </li>
                                    
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    
                                    <li>
                                        <a href="about.php">About</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.menu-list -->
                            </div>
                            <!-- /.menu-content-->
                        </div>
                        <!-- /.menu-wrapper -->
                    </nav>
                    <!-- /.site-navigation -->
                    <!--Mobile Main Menu-->
                    <div class="mobile-menu-main hidden-md hidden-lg">
                        <div class="menucontent overlaybg"> </div>
                        <div class="menuexpandermain slideRight">
                            <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                <span></span>
                            </a>
                        </div>
                        <!--/.menuexpandermain-->

                        <div id="mobile-main-nav" class="mb-navigation slideLeft">
                            <div class="menu-wrapper">
                                <div id="main-mobile-container" class="menu-content clearfix"></div>
                            </div>
                        </div>
                        <!--/#mobile-main-nav-->
                    </div>
                    <!--/.mobile-menu-main-->
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>
    <!-- /.header-bottom-area -->