<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$pickup=$_POST['pickup'];
$dropoff=$_POST['dropoff'];
$fromDate=$_POST['fromDate'];
$toDate=$_POST['toDate'];
$days=$_POST['days'];
$total=$_POST['total']; 
$pay_method=$_POST['pay_method'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  booking(userEmail,vehicle_id,pickup,dropoff,fromDate,toDate,days,total,pay_method,status) VALUES(:useremail,:vhid,:pickup,:dropoff,:fromDate,:toDate,:days,:total,:pay_method,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':pickup',$pickup,PDO::PARAM_STR);
$query->bindParam(':dropoff',$dropoff,PDO::PARAM_STR);
$query->bindParam(':fromDate',$fromDate,PDO::PARAM_STR);
$query->bindParam(':toDate',$toDate,PDO::PARAM_STR);
$query->bindParam(':days',$days,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->bindParam(':pay_method',$pay_method,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}


}

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
    <title>Car Details - Car Rental Website</title>

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
    <link rel="stylesheet" href="assets/css/dateTimePicker.css">

    <!-- RS5.4 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">
    <!-- RS5.4 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">
    
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
                    <h2 class="page-title">Home / Car Details</h2>
                    <p class="page-description yellow-color">Car Information</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div>
 <div class="vehicle-single-block vehicle-padding">
        <div class="container">
            <div class="row">
              <?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT vehicles.*,brands.brand_name,brands.id as bid  from vehicles join brands on brands.id=vehicles.VehiclesBrand where vehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>
                <div class="col-md-8">
                    <div class="corousel-gallery-content">
   <div class="gallery">
<div class="full-view owl-carousel">
  <a class="item" href="#">
<img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></a>
  <a class="item" href="#"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></a>
  <a class="item" href="#"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></a>
  <a class="item" href="#"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></a>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <a class="item" href="#"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></a>
  <?php } ?>
</div>
<!--/Listing-Image-Slider-->
<div class="list-view owl-carousel">
  <div class="item">
<img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
 <div class="item"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div class="item"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div class="item"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div class="item"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</div>
<!--/Listing-Image-Slider-->
</div>
</div>

                    <div class="vehicle-single-content">
                        <div class="tb mb-block">
                            <div class="tb-cell mb-block">
                               <h2 class="vehicle-single-title"><?php echo htmlentities($result->brand_name);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
                            </div><!-- /.tb-cell -->
                            <div class="tb-cell mb-block">
                               <h2 class="pull-right rent-price">Rent/Day: ৳<?php echo htmlentities($result->PricePerDay);?></h2>
                            </div><!-- /.tb-cell -->
                        </div><!-- /.tb -->
                        <div class="clearfix"></div><!-- /.clearfix -->
                        
                        <div class="price-details">
                            <h3 class="details-title">Price Details-</h3>
                             <div class="main_features">
                        <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->FuelType);?></h5>
              <p>Fuel Type</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
                        </div><!-- /.price -->

                        <div class="vehicle-overview">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="overview-title">Car Overview</h3>
                                    <div class="overview">
                                        <ul>
                                            <p><?php echo htmlentities($result->VehiclesOverview);?></p>  
                                        </ul>
                                    </div><!-- /.vehicle-overview -->
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.overview -->

                        <div class="vehicle-internal-features">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="features-title">Internal features:</h3>
                                <div class="col-md-6">                          
                                    
                                    <table class="table table-bordered">
                                      <tbody>
                                    <tr>
                      <td>Air Conditioner</td>
<?php if($result->AirConditioner==1)
{
?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
   <?php } ?> </tr>
   <tr>
<td>AntiLock Braking System</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>

<tr>
<td>Power Steering</td>
<?php if($result->PowerSteering==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   

<tr>

<td>Power Windows</td>

<?php if($result->PowerWindows==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   
 <tr>
<td>CD Player</td>
<?php if($result->CDPlayer==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
        </tbody>
              </table>
        </div><!-- /.col-md-6 -->
                                
                                <div class="col-md-6">                                    
                                    <table class="table table-bordered">
                                      <tbody>
<tr>
<td>Central Locking</td>
<?php if($result->CentralLocking==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Door Locks</td>
<?php if($result->PowerDoorLocks==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>
                    <tr>
<td>Brake Assist</td>
<?php if($result->BrakeAssist==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php  } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Driver Airbag</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
 </tr>
 
 <tr>
 <td>Passenger Airbag</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Crash Sensor</td>
<?php if($result->CrashSensor==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
</tbody>
</table>
                                </div><!-- /.col-md-6 -->
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.indoor -->
                    </div><!-- /.vehicle-single-content -->
 
  
                    <?php }} ?>

                    
                </div> <!-- /.col-md-8 -->


<script>
function carcheckAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "carcheck_availability.php",
data:'fromDate='+$("#fromDate").val(),
type: "POST",
success:function(data){
$("#car-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function carcheckAvailability1() {
$("#loaderIcon").show();
jQuery.ajax({
url: "carcheck_availability.php",
data:'toDate='+$("#toDate").val(),
type: "POST",
success:function(data){
$("#car-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

                <div class="col-md-4">
                    <div class="vehicle-sidebar pd-zero">                    
                        <form method="post" name="submit" class="advance-search-query search-query-two">
                            <h2 class="form-title">Reservation Form</h2>
                            <div class="form-content available-filter">
                                <div class="regular-search">
                                <div class="form-group">

                                    <label class="text-uppercase">Picking up location</label>
                                    <div class="input">
                                        <i class="fa fa-map-marker"></i>
                                        <input type="text" placeholder="Pick-up Location" name="pickup" class="pick-location form-controller" required>
                                    </div><!--/.input-->

                                    <label class="text-uppercase">Dropping off location</label>
                                    <div class="input">
                                        <i class="fa fa-map-marker"></i>
                                        <input type="text" placeholder="Drop-off Location" name="dropoff" class="pick-location form-controller" required>
                                    </div><!--/.input-->

                                    <label>Picking up Date</label>
                                    <div class="input">                                        
                                  <input type="date"  name="fromDate" id="fromDate" onBlur="carcheckAvailability()" onchange="getOrderTotal()" required>
                                        <span id="car-availability-status" style="font-size:12px;"></span>
                                    </div><!--/.input-->

                                    <label>Dropping off Date</label>
                                    <div class="input">                                        
                                        <input type="date" name="toDate" id="toDate" onBlur="carcheckAvailability1()" onchange="getOrderTotal()" required>
                                        <span id="car-availability-status1" style="font-size:12px;"></span>
                                    </div><!--/.input-->
                                     
                                     <div class="form-group">                                  
                                    <label class="text-uppercase">Payment Method</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="Cash at Pick-up" name="pay_method">Cash at Pick-up</label>
              <label class="checkbox-inline"><input type="checkbox" value="Visa Card" name="pay_method">Visa Card</label>
            </div>

      <?php

         
       $sql = $dbh->prepare("SELECT tax FROM price");
         $sql->execute();

       
       $tax = $sql->fetchColumn();
       
        
         $sql = $dbh->prepare("SELECT discount FROM price");
         $sql->execute();

       
       $discount = $sql->fetchColumn();

            
        

          ?>
      
      <script>

        function getOrderTotal() {

var fromDate= document.getElementById('fromDate').value;
var toDate= document.getElementById('toDate').value;
var date1 = new Date(fromDate);
var date2= new Date(toDate);

var ONE_DAY = 1000 * 60 * 60 * 24;
var d1 = date1.getTime();
var d2 = date2.getTime();
var diff = Math.abs(d1 - d2);

var days = Math.round(diff/ONE_DAY);

        var price = <?php echo htmlentities($result->PricePerDay); ?>;
        var tax = <?php echo $tax; ?>;

        var discount = <?php echo $discount; ?>;
                 
        
        var discount_amount = price * (discount/100);
        var discounted_total = price - discount_amount

        var tax_amount = discounted_total * (tax/100);

        var subtotal = discounted_total + tax_amount;

        var total = subtotal * days;
         
        document.getElementById('days').value = days;
        document.getElementById('total').value = total;
        
      }


      </script>

            <div class="form-group">
              <label> Tax Amount : <?php echo $tax; ?> % </label>                      
            </div>
            <div class="form-group">              
              <label> Discount : <?php echo $discount; ?> % </label>                     
            </div>
            <div class="form-group">              
              <label> Duration of Rent: </label>
              <input name="days" type="text" id="days" readonly="true" value="<?php echo $days; ?>"/> Days          
            </div>
            <label> Total Price: </label>
            <div class="form-group">              
              <input name="total" type="text" id="total" readonly="true" value="<?php echo $total; ?>"/> Tk.          
            </div>
                                </div><!-- /.form-group -->

                                </div><!-- /.div regular-search -->

                                <?php if($_SESSION['login'])
              {?>
              <div class="check-vehicle-footer">
                <input type="submit" class="button yellow-button"  name="submit" id ="submit" value="Book Now">
              </div>
              <?php } else { ?>

             <div class="form-group"> 
            <a href="#loginform" class="button yellow-button" data-toggle="modal" data-dismiss="modal">Login For Book</a>
              <?php } ?> 
              </div>
                            </div><!-- /.from-cotent -->
                        </form><!-- /.advance_search_query -->                        
                        
                    </div><!-- /.vehicle-sidebar -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container  -->
    </div><!-- /.Popular Vehicle Block --> 
    
 
    
  



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
    <script type="text/javascript" src="assets/js/dateTimePicker.min.js"></script>
   

  </script>
</body>
</html>