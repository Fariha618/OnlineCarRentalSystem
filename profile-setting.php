<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['c_name'];
$c_contact=$_POST['c_contact'];
$c_dob=$_POST['c_dob'];
$c_address=$_POST['c_address'];
$c_city=$_POST['c_city'];
$c_country=$_POST['c_country'];
$email=$_SESSION['login'];
$sql="update customers set c_name=:name,c_contact=:c_contact,c_dob=:c_dob,c_address=:c_address,c_city=:c_city,c_country=:c_country where c_email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':c_contact',$c_contact,PDO::PARAM_STR);
$query->bindParam(':c_dob',$c_dob,PDO::PARAM_STR);
$query->bindParam(':c_address',$c_address,PDO::PARAM_STR);
$query->bindParam(':c_city',$c_city,PDO::PARAM_STR);
$query->bindParam(':c_country',$c_country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
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
        

<?php 
$customeremail=$_SESSION['login'];
$sql = "SELECT * from customers where c_email=:customeremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':customeremail',$customeremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

<section>
    
  <div class="container"> 
    <div class="row">
         <div class="col-md-12">
          <div class="profile-content clearfix">
                    
               <h4>General Settings</h4>
                  <div class="row">                   
                      <form  method="post">

        <div class="row">
                        <div class="input col-sm-6">
                        <label>Full Name: </label>                                       
<input class="form-control" name="c_name" value="<?php echo htmlentities($result->c_name);?>" id="c_name" type="text"  required>
                    </div><!--/.input-->
                    </div>

        <div class="row">
                      <div class="input col-sm-6">
                      <label>Email: </label>                                       
<input class="form-control" name="c_email" value="<?php echo htmlentities($result->c_email);?>" id="email" type="email"  required>
                    </div><!--/.input-->
                      </div>


                      <div class="row">
                      <div class="input col-sm-6">
                      <label>Phone Number: </label>                                       
<input class="form-control" name="c_contact" value="<?php echo htmlentities($result->c_contact);?>" id="c_contact" type="text" required>
                    </div><!--/.input-->
                      </div>

                      <div class="row">
                      <div class="input col-sm-6">
                      <label>Date of Birth: </label>                                       
<input class="form-control" value="<?php echo htmlentities($result->c_dob);?>" name="c_dob" placeholder="dd/mm/yyyy" id="c_dob" type="text" >
                    </div><!--/.input-->
                      </div>

                      <div class="row">
                      <div class="input col-sm-6">
                      <label>Address: </label>                                       
<input class="form-control"  id="c_address" name="c_address" value="<?php echo htmlentities($result->c_address);?>" type="text">
                    </div><!--/.input-->
                      </div>


                      <div class="row">
                      <div class="input col-sm-6">
                      <label>Country: </label>                                       
<input class="form-control"  id="c_country" name="c_country" value="<?php echo htmlentities($result->c_country);?>" type="text">
                    </div><!--/.input-->
                      </div>


                      <div class="row">
                      <div class="input col-sm-6">
                      <label>City: </label>                                       
<input class="form-control" id="c_city" name="c_city" value="<?php echo htmlentities($result->c_city);?>" type="text">
                    </div><!--/.input-->
                      </div>
                               <?php }} ?>

<div class="subimt-button clearfix">
                                    <input type="submit" name="updateprofile" value="Save Changes" class="submit yellow-button">
                                </div><!-- /.subimt -->
                               

                                
                                     </form>
                                </div><!-- /.row -->
                                
                              
                                                            
                       
                        </div><!-- /.profile-content -->
                    
                </div><!-- /.col-md-12 -->   
      
  </div>
</section>
<!--/Profile-settings--> 


</body>

</html>
<?php } ?>