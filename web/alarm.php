<?php
include "connection.php";
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
$dayTdy = date('D', time());
$timeNow = date('H:i:s', time());
echo $timeNow;

$queryGet = "select * from alarm"; 
$resultGet = mysqli_query($link,$queryGet); 
if(!$resultGet) {
	die ("Invalid Query - get Items List: ". mysqli_error($link));
}
else 
{
	while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
	{
		$array = explode(',', $row['day']);	
		$day = implode(" ", $array);
		$time = $row['time'];
		if(strcmp($day,$dayTdy) > 0)
		{
			if(strcmp($time,$timeNow) > 0)
			{
				echo "<br>Alarm Trigger";
			}
		}
	}
}
session_destroy()
?>
