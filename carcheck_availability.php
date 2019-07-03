<?php 
require_once("includes/config.php");

// car availablity check

if(!empty($_POST["fromDate"])) {
	$fromDate= $_POST["fromDate"];

$sql ="SELECT vehicle_id, fromDate, toDate, status FROM booking WHERE fromDate <= :fromDate AND toDate >= '$fromDate'";

$query= $dbh -> prepare($sql);
$query-> bindParam(':fromDate', $fromDate, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);


if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Car is not available at this date. Please Select another date! </span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Car is available! </span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}


}


if(!empty($_POST["toDate"])) {
	$toDate= $_POST["toDate"];

$sql ="SELECT vehicle_id, fromDate, toDate, status FROM booking WHERE toDate >= :toDate AND fromDate <= '$toDate'";

$query= $dbh -> prepare($sql);
$query-> bindParam(':toDate', $toDate, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Car is not available at this date. Please Select another date! </span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Car is available! </span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}

}


?>
