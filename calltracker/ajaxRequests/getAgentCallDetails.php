<?php
include("../db_connection.php");

$id = $_REQUEST['id'];

if(isset($_REQUEST['limit']))
	$limit = $_REQUEST['limit'];
else
	$limit = 10;
	
if(isset($_REQUEST['offset']))
	$offset = $_REQUEST['offset'];
else
	$offset = 0;

if(isset($_REQUEST['order']))
	$order = $_REQUEST['order'];
else
	$order = "desc";

if(isset($_REQUEST['sort']))
	$sort = $_REQUEST['sort'];
else
	$sort = "daytime";
	
if(isset($_REQUEST['startDate']))
	$startDate = $_REQUEST['startDate'];
else
{
	$dtObj7 = new DateTime("now");
	//$dtObj7->sub(new DateInterval('P7D'));
    $dtObj7->setTimeZone(new DateTimeZone("Asia/Kolkata"));
    $startDate = $dtObj7->format("d-m-Y");
    //echo $startDate;
}
	
if(isset($_REQUEST['endDate']))
	$endDate = $_REQUEST['endDate'];
else
{
	$dtObj = new DateTime("now");
    $dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
    $endDate = $dtObj->format("d-m-Y");	
}

$callTypeArray = array();
$callTypeQuery = "select * from calltype";
$callTypeResult = mysqli_query($db,$callTypeQuery);
while( $callTypeRow = mysqli_fetch_array($callTypeResult) )
{
	$callTypeArray[$callTypeRow['id']] = $callTypeRow['name'];
}


/*
SELECT * FROM `calllog` WHERE agentId = 3 and daytime BETWEEN STR_TO_DATE('06-01-2015','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('09-01-2015','%d-%m-%Y'),INTERVAL 1 DAY) ORDER BY daytime desc limit 0,10
*/
//$limit = 10;
$startDate = "01-01-2015";
$callLogArray = array();
//$selectQuery = "SELECT * FROM `calllog` WHERE agentId = ".$id." and daytime BETWEEN STR_TO_DATE('".$startDate."','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('".$endDate."','%d-%m-%Y'),INTERVAL 1 DAY) ORDER BY ".$sort." ".$order." limit ".$offset.",".$limit;					
$selectQuery = "SELECT * FROM (SELECT * FROM `calllog` WHERE agentId = ".$id." and daytime BETWEEN STR_TO_DATE('".$startDate."','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('".$endDate."','%d-%m-%Y'),INTERVAL 1 DAY) ORDER BY daytime desc limit ".$offset.",".$limit.") as tbl ORDER BY ".$sort." ".$order;		
$selectResult = mysqli_query($db,$selectQuery);
$i = 0;
while( $selectRow = mysqli_fetch_array($selectResult) )
{
	$singleCallLog = array();
	$singleCallLog['id'] = ++$i;
	$singleCallLog['callTypeId'] = $callTypeArray[$selectRow['callTypeId']];
	$singleCallLog['phone'] = $selectRow['phone'];
	$singleCallLog['duration'] = $selectRow['duration'];
	$singleCallLog['name'] = $selectRow['name'];
	$singleCallLog['daytime'] = $selectRow['daytime'];
	$singleCallLog['songrecord'] = $selectRow['songrecord'];
		/**
		* 
		* Code for Location
		* 
		*/
		if($selectRow['locationId'] != 0)
		{
			$locationQuery = "select * from location where id = ".$selectRow['locationId'];
			//$locationResult = mysqli_query($db,$locationQuery);
			//$locationArray = mysqli_fetch_assoc($locationResult);
			//$singleCallLog['location'] = [$locationArray['lattitude'],$locationArray['longitude']];
		}
		else
			$singleCallLog['location'] = 0;
	array_push($callLogArray,$singleCallLog);
}

$totalQuery = "select count(*) from calllog where agentId = ".$id." and daytime BETWEEN STR_TO_DATE('".$startDate."','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('".$endDate."','%d-%m-%Y'),INTERVAL 1 DAY)";
$totalResult = mysqli_query($db,$totalQuery);
$totalRow = mysqli_fetch_row($totalResult);
$total = $totalRow[0];

$finalArray = array();
$finalArray['total'] = $total;
$finalArray['rows'] = $callLogArray;
// echo $startDate;
echo json_encode($finalArray);
?>