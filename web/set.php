<?php
include "connection.php";
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
$dayTdy = date('D', time());
$M = 0;
$T = 0; 
$W = 0; 
$TR = 0; 
$F = 0; 
$S = 0; 
$SU= 0;
if(isset($_POST["submit"])){ //submite form
	$topic = $_POST["topic"];
	$M = $_POST["M"];
	$T = $_POST["T"];
	$W = $_POST["W"];
	$TR = $_POST["TR"];
	$F = $_POST["F"];
	$S = $_POST["S"];
	$SU= $_POST["SU"];
	$day = $M .','. $T .','. $W .','. $TR .','. $F .','. $S .','. $SU;
	$time = $_POST["time"];
		
	$queryInsert = "INSERT INTO alarm (id, topic, time, day, status) 
  			  VALUES(NULL, '$topic', '$time', '$day', 1)";

	$resultInsert = mysqli_query($link,$queryInsert);
	if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else { //notification to main
		$timearr = array();
		$titlearr = array();
		$dayarr = array();
		$queryGet = "select * from alarm WHERE status = 1"; 
		$resultGet = mysqli_query($link,$queryGet); 
		$no=0;
		if(!$resultGet) {
			die ("Invalid Query - get Items List: ". mysqli_error($link));
		}
		else 
		{
			while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
			{
				$array = explode(',', $row['day']);	
				$day = implode("", $array);
				$time = $row['time'];
				if(strcmp($day,$dayTdy) == 0)
				{
					$timearr[] = $time;
					$titlearr[] = $row['topic'];
					$dayarr[] = $day;
				}
				
			}
			$_SESSION['time'] = $timearr;
			$_SESSION['title'] = $titlearr;
			$_SESSION['day'] = $dayarr;
		}

		echo '<script type="text/javascript">
			window.onload = function () 
			{ 
			alert("Alarm has been added...");
			open("setalarm.php","_top");
			}
			</script>';

	}
}
//delete fucntion
if(isset($_GET["id"]))
{
	$id =$_GET["id"];
	$queryDelete = "DELETE FROM alarm WHERE id = '".$id."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		header("Location: setalarm.php");
	}
}
//Update funtion
if(isset($_GET["sid"]))
{
	$sid =$_GET["sid"];
	$resultSelect = mysqli_query($link,"SELECT * FROM alarm WHERE id = '".$sid."'");
	$row= mysqli_fetch_array($resultSelect, MYSQLI_BOTH);
	if($row['status']==1)
		$status = 0;
	else
		$status = 1;
	$queryDelete = "UPDATE alarm SET status = '".$status."' WHERE id = '".$sid."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		$timearr = array();
		$titlearr = array();
		$dayarr = array();
		$queryGet = "select * from alarm WHERE status = 1"; 
		$resultGet = mysqli_query($link,$queryGet); 
		$no=0;
		if(!$resultGet) {
			die ("Invalid Query - get Items List: ". mysqli_error($link));
		}
		else 
		{
			while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
			{
				$array = explode(',', $row['day']);	
				$day = implode("", $array);
				$time = $row['time'];
				if(strcmp($day,$dayTdy) == 0)
				{
					$timearr[] = $time;
					$titlearr[] = $row['topic'];
					$dayarr[] = $day;
				}
				
			}
			$_SESSION['time'] = $timearr;
			$_SESSION['title'] = $titlearr;
			$_SESSION['day'] = $dayarr;
		}
		header("Location: setalarm.php");
	}
}
?>
