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
    <title>Car Listing</title>

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

    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">   
</head>

<body>
    <!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

    <!-- ====== Page Header ====== -->
    <div class="page-header background-overlay" style="background-image:url(assets/images/page-header-one.png)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">Home / Cars </h2>
                    <p class="page-description yellow-color">Lists of Cars</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div>

 <!-- ====== Popular Vehicle Block ====== --> 
    <div class="popular-vehicle-block pd-90 ex-pdt-102 ex-pdtm-72">
        <div class="container">

            <div class="row tb default-margin-bottom yellow-theme">
                <!-- block-title-area -->
                <div class="col-md-12 col-sm-12 block-title-area tb-cell">
                    <div class="heading-content style-one border">
                        <h3 class="subtitle">Popular Rental Services</h3>
                        <h2 class="title">Popular car</h2>
                    </div><!-- /.heading-content-one -->
                </div><!-- /.col-md-9 -->               
            </div><!-- /.row --> 

<div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
$sql = "SELECT id from vehicles";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><label><?php echo htmlentities($cnt);?> Listings</label></p>
</div>
</div>


<?php $sql = "SELECT vehicles.*,brands.brand_name,brands.id as bid  from vehicles join brands on brands.id= vehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
            <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="vehicle-content theme-yellow">
                                <div class="vehicle-thumbnail">
                                    <a href="#">
                                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="car-item" />
                                    </a>
                                </div><!-- /.vehicle-thumbnail -->
                                <div class="vehicle-bottom-content">
                                    <h2 class="vehicle-title"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->brand_name);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h2>
                                    <div class="vehicle-meta">
                                        <div class="meta-item">
                                            <span>Rent:  ৳ <?php echo htmlentities($result->PricePerDay);?> </span>
                                            <span>
                                                <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($result->SeatingCapacity);?> seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlentities($result->ModelYear);?> model</li>
              <li><i class="fa fa-car" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType);?></li>
            </ul> 
        </span>
        <span> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="button black-button slider-button">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </span>
                                        </div>
                                    </div><!-- /.meta-left -->
                                </div><!-- /.vehicle-bottom-content -->
                            </div><!-- /.car-content -->
                        </div><!-- /.col-md-4 -->
               <?php }} ?>
                
</div>
</div>
    

  <!-- ====== Recently Listed Cars  Block ====== --> 
    <div class="ralated-block bg-gray-color">
     
   </div><!-- /.Recently Listed Cars-block -->               

    

    <!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

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

    <script src="assets/jquery-ui/jquery-ui.min.js"></script> <!-- main-js -->
</body>

</html>