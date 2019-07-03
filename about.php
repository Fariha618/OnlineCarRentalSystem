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
    <title>About Page</title>

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
                    <h2 class="page-title">About</h2>
                    <p class="page-description yellow-color">About Us</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div>

    <!-- ====== About Main Content ====== --> 
    <div class="about-main-content mr-top-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-top-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading-content-three">
                                    <h2 class="title">Why <br />Choose Us</h2>
                                    <h4 class="sub-title">Best offers Information</h4>
                                </div><!-- /.section-title-area -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="extra-big-title">Best Rent Service enjoy your life</h2>
                            </div><!-- /.col-md-12 -->
                            <div class="col-md-6">
                                <div class="about-content-left">
                                    <p>Sed pellentesque pulvinar arcu ac congue. Sed sed est nec justo maximus blandit. Curabitur lacinia, eros sit amet maximus suscipit, magna sapien veneuynatis eros, et gravida urna massa ut lectus. Quisque lacinia laciunia viverra. Nullram nec est et lorem sodales ornare a in sapien. In trtset urna marximus, conse ctetur iligula in, gravida erat. Nullam digniifssrim hendrerit auctor. Sed varius, dolor vitae iaculis condim rtweentum, massa nisl cursus sapien, gravida ultrices nisi dolor non erat. Nullam digniifssrim hendrerit auctor. Sed varius, dolor vitae dolor vitae iaculis condim rtweentum.</p>
                                    <p>Sed pellentesque pulvinar arcu ac congue. Sed sed est nec justo maximus blandit. Curabitur lacinia, eros sit amet maximus suscipit, magna sapien veneuynatis eros, et gravida urna massa ut lectus. Quisque lacinia.</p>
                                </div><!-- /.about-content-left-->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-6">
                                <img src="assets/images/about/about-01.png" alt="car-item" />
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.top-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.about-main-content -->

       <div class="blog-content-block pd-90 bg-gray-color">
        <div class="container">
            
        </div><!-- /.container -->
    </div>>

    <!-- ======footer area======= -->
    <div class="container footer-top-border">
        <div class="vehicle-multi-border"></div><!-- /.vehicle-multi-border -->
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