<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!doctype html>
<html lang="en">


<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Texicab is a modern presentation HTML5 Car Rent template.">
    <meta name="keywords" content="HTML5, Template, Design, Development, Car Rent" />
    <meta name="author" content="">

    <!-- Titles
    ================================================== -->
    <title>Contact Page</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">

    <!-- Custom Font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto+Slab:400,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color-schemer.css">   
</head>

<body>
    <!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

    <!-- ====== Page Header ====== -->
    <div class="page-header nevy-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">Contact</h2>
                    <p class="page-description yellow-color">Contact With Us</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div><!-- /.page-header --> 

    <!-- ====== Page Header ====== -->
    <div class="contact-us-area mr-top-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-three">
                        <h2 class="title">Contact us</h2>
                    </div><!-- /.section-title-area -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-us-content-left">
                        <div class="contact">
                            <h4><i class="fa fa-map-marker"></i>Address</h4>
                            <p>27 no, Dhanmondi <br>Dhaka</p>
                        </div><!-- /.contact -->
                    
                        <div class="contact">
                            <h4><i class="fa fa-phone"></i>Call</h4>
                            <p>+88 021565656 <br>+088 0167-6984365</p>
                        </div><!-- /.contact -->

                        <div class="contact">
                            <h4><i class="fa fa-envelope"></i>Mail</h4>
                            <p>example@domain.com <br />  examplemail@domain.com</p>
                        </div><!-- /.contact -->

                        <div class="contact">
                            <h4><i class="fa fa-user-circle"></i>Social account</h4>
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div><!-- /.Social-icon -->
                        </div><!-- /.contact -->
                    </div><!-- /.contactus-content-left -->
                </div><!-- /.col-md-4 -->
                
                <div class="col-md-8">
                    <div class="contact-us-content-right">
                        <img src="assets/images/contact-form-img.png" alt="">
                    </div><!-- /.contactus-content-right -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.contact-us -->

    <!-- ====== Map Block ====== -->
    <div class="map-block mr-btm-78">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="heading-content style-two">
                       <h3 class="subtitle">Find Our location</h3>
                       <h2 class="title color-nevy">Map &amp; Directions</h2>
                    </div><!-- /.about-heading-content -->
                        <div class="header-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.911641592151!2d90.36586001423123!3d23.750530084589226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4e2c05cd5b%3A0xfd49cfbf95c0c749!2sNizam+Shankar+Plaza%2C+2+Satmasjid+Road%2C+Dhaka+1207!5e0!3m2!1sen!2sbd!4v1515669985171" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div><!-- /.map-content -->
                        <p>Find out how to find us from your current location</p>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.map-area -->

    <!-- ======footer area======= -->
    <div class="container footer-top-border">
        <div class="vehicle-multi-border yellow-black"></div><!-- /.vehicle-multi-border -->
    </div><!-- /.container -->
        
    <!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

       
    <!-- All The JS Files
    ================================================== --> 
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/carrent.min.js"></script> <!-- main-js -->
</body>

</html>