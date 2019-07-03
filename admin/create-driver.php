<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$driver_name=$_POST['driver_name'];
$driver_contact=$_POST['driver_contact'];
$driver_dob=$_POST['driver_dob'];
$driver_address=$_POST['driver_address'];
$job_type=$_POST['job_type'];
$nationality=$_POST['nationality'];
$driver_image=$_FILES["img"]["name"];

move_uploaded_file($_FILES["img"]["tmp_name"],"img/driverimages/".$_FILES["img"]["name"]);


$sql="INSERT INTO drivers(driver_name,driver_contact,driver_dob,driver_address,job_type,nationality,driver_image) VALUES(:driver_name,:driver_contact,:driver_dob,:driver_address,:job_type,:nationality,:driver_image)";
$query = $dbh->prepare($sql);
$query->bindParam(':driver_name',$driver_name,PDO::PARAM_STR);
$query->bindParam(':driver_contact',$driver_contact,PDO::PARAM_STR);
$query->bindParam(':driver_dob',$driver_dob,PDO::PARAM_STR);
$query->bindParam(':driver_address',$driver_address,PDO::PARAM_STR);
$query->bindParam(':job_type',$job_type,PDO::PARAM_STR);
$query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
$query->bindParam(':driver_image',$driver_image,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="New Driver added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Website | Admin Post Vehicle</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add New Driver</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
<label class="col-sm-2 control-label">Driver Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_name" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Contact No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_contact" class="form-control" required>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea class="form-control" name="driver_address" rows="3" required></textarea>
</div>
<label class="col-sm-2 control-label">Date of Birth<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_dob" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nationality<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="nationality" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Job Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="job_type" required>
<option value=""> Select </option>
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select>
</div>
</div>

<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Driver Image <span style="color:red">*</span><input type="file" name="img" required>
</div>
</div>

<div class="hr-dashed"></div>							





											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

			

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>