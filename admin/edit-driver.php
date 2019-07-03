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
$driver_image=$_POST['driver_image'];
$id=intval($_GET['id']);

$sql="update drivers set driver_name=:driver_name,driver_contact=:driver_contact,driver_dob=:driver_dob,driver_address=:driver_address,job_type=:job_type,nationality=:nationality,driver_image=:driver_image where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':driver_name',$driver_name,PDO::PARAM_STR);
$query->bindParam(':driver_contact',$driver_contact,PDO::PARAM_STR);
$query->bindParam(':driver_dob',$driver_dob,PDO::PARAM_STR);
$query->bindParam(':driver_address',$driver_address,PDO::PARAM_STR);
$query->bindParam(':job_type',$job_type,PDO::PARAM_STR);
$query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
$query->bindParam(':driver_image',$driver_image,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


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
	
	<title>Car Rental Portal | Admin Edit Driver Info</title>

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
					
						<h2 class="page-title">Edit Driver</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=$_GET['id'];
$sql ="SELECT * from drivers where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Driver Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_name" class="form-control" value="<?php echo htmlentities($result->driver_name)?>" required>
</div>
<label class="col-sm-2 control-label">Select Job Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="job_type" required>
<option value="<?php echo htmlentities($results->job_type);?>"> <?php echo htmlentities($result->job_type);?> </option>
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select>
</div>
</div>
											
<div class="hr-dashed"></div>

<div class="form-group">
<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="driver_address" rows="3" required><?php echo htmlentities($result->driver_address);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_contact" class="form-control" value="<?php echo htmlentities($result->driver_contact);?>" required>
</div>
<label class="col-sm-2 control-label">Date of Birth<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="driver_dob" class="form-control" value="<?php echo htmlentities($result->driver_dob);?>" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Nationality<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="nationality" class="form-control" value="<?php echo htmlentities($result->nationality);?>" required>
</div>
</div>

<div class="hr-dashed"></div>																	

<div class="form-group">
<div class="col-sm-4">
Image <img src="img/driverimages/<?php echo htmlentities($result->driver_image);?>" width="300" height="200" style="border:solid 1px #000">
<a href="driverimage.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
</div>
</div>

<div class="hr-dashed"></div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
													<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
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