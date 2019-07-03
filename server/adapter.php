<?php
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Content-Language, Authorization');
header('Access-Control-Expose-Headers: Authorization');

# CONFIG
define('_DB_HOST', 'localhost');
define('_DB_NAME', 'car_rental');
define('_DB_USER', 'root');
define('_DB_PASS', '');

# DB CONNECT
$connection = mysql_connect(_DB_HOST, _DB_USER, _DB_PASS) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
$db = mysql_select_db(_DB_NAME, $connection) or die ('request "Unable to select database."');

# ACTION

$fromDate= $_POST["fromDate"];
$toDate= $_POST["toDate"];

$keys = isset($_REQUEST['keys'])?$_REQUEST['keys']:array();
if (!is_array($keys)){
	$keys = array($keys);
}
$keys = array_filter($keys);

# RESULT
$unavailable = array();
if (!empty($keys)){
	$sql = "SELECT vehicle_id, fromDate, toDate FROM booking WHERE `date` BETWEEN STR_TO_DATE('$fromDate','%d-%m-%Y') AND STR_TO_DATE('$toDate','%d-%m-%Y') IN ('".implode("', '", $keys)."')";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($row = mysql_fetch_assoc($sql_result)) {
		$unavailable[] = $row['date'];
	}
}
echo(json_encode($unavailable));
exit();

?>