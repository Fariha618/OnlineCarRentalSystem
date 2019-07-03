<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
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
    <title>Profile Page</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">

    <!-- Custom Font
    ================================================== -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto+Slab:400,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color-schemer.css">

    <!-- RS5.4 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">
    <!-- RS5.4 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">
    
</head>
<body>



<section class="user_profile inner_pages">
  <div class="container">
    <div class="row">
         <div class="col-md-12">
                    <div class="contact-us-content-right">
                        <form action="#">                    
                            <div class="input-content clearfix">
                                <h4>My Bookin List</h4>
                                <div class="row">
<?php 
$customeremail=$_SESSION['login'];
 $sql = "SELECT vehicles.Vimage1 as Vimage1,vehicles.VehiclesTitle,vehicles.id as vid,brands.brand_name,booking.fromDate,booking.toDate,booking.days,booking.total,booking.pay_method,booking.status from booking join vehicles on booking.vehicle_id= vehicles.id join brands on brands.id=vehicles.VehiclesBrand where booking.userEmail=:customeremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

                 <div class="col-md-12">
                    <div class="vehicle-content theme-yellow">
                      
                        <div class="vehicle-thumbnail col-md-3 col-sm-6 col-xs-6">
                            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                            <h2 class="vehicle-title"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->brand_name);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h2>
                            <div class="vehicle-meta">
                                
                    <p>
                    <b>From Date:</b> <?php echo htmlentities($result->fromDate);?><br> 
                    <b>To Date:</b> <?php echo htmlentities($result->toDate);?><br> 
                    <b>Duration of Rent:</b> <?php echo htmlentities($result->days);?><br> 
                    <b>Total Rent Price:</b> <?php echo htmlentities($result->total);?><br> 
                    <b>Payment Method:</b> <?php echo htmlentities($result->pay_method);?> 
                  </p>
                                

              <?php if($result->status==1)
                { ?>
                <p><b>Status:</b>Confirmed<br> </p>
            <div class="clearfix"></div>                           
        

              <?php } else if($result->status==2) { ?>
 <p><b>Status:</b> Cancelled<br> </p>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
       
             

                <?php } else { ?>
 <p><b>Status:</b> Not Confirmed Yet<br> </p>
            <div class="clearfix"></div>
        
                <?php } ?>
                            </div><!-- /.meta-left -->
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->

                </div><!-- /.col-md-3 -->              
                
       <?php }} ?>
            
                                </div><!-- /.row -->                              
                                
                            </div><!-- /.input-content -->
                        </form>
                    </div><!-- /.contactus-content-right -->
                </div><!-- /.col-md-12 -->
     
      
  </div>   
</section>
<!--/my-bookings--> 

</body>
</html>
<?php } ?>