<?php
session_start();
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	    <meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	    <title>&#x1F1F2&#x1F1FE Smart Home Alarm System</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" href="./style.css">
		<script> function myFunction() { var element = document.body; 
				element.classList.toggle("dark-mode");
			}
		</script>		
		<style type="text/css">
		
		.switch input { opacity: 0; width: 0; height: 0;
		}
		.slider { position: absolute; cursor: pointer; top: 0; right: 0; bottom: 0; 
			background-color: #ccc; -webkit-transition: .4s; transition: .4s;
		}
		.slider:before { position: absolute; content: ""; height: 26px; width: 26px; left: 4px; 
			bottom: 4px; background-color: white; -webkit-transition: .4s; transition: .4s;
		}
		input:checked + .slider { background-color: #2196F3;
		}
		input:focus + .slider { box-shadow: 0 0 1px #2196F3;
		}
		input:checked + .slider:before { -webkit-transform: translateX(26px); -ms-transform: 
			translateX(26px); transform: translateX(26px);
		}
		/* Rounded sliders */ .slider.round { border-radius: 34px;
		}
		.slider.round:before { border-radius: 50%;
		}
		body { padding: 25px; background-color: white; color: black; font-size: 25px;
		}
		.dark-mode { background-color: black; color: white;
		}
		.clock{ position: fixed; top: 35%; left: 50%; transform: translateX(-50%) 
			translateY(-50%);
			font-size: 130px; padding: 0px 5px 0px 5px;
		}
		.button { 
			background-color: #000000; /* Green */ border: none; color: white; padding: 
			16px 32px; text-align: center; text-decoration: none; display: inline-block; 
			font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;
		}
		.button5 { background-color: white; color: black; border: 2px solid #555555;
		}
		.button5:hover { background-color: #555555; color: white;
		}
		label { display: contents; font: 1rem 'Fira Sans', sans-serif;
		}
		input, label { margin: .4rem 0;
		}
		.weekDays-selector input { display: none!important;
		}
		.weekDays-selector input[type=checkbox] + label { display: inline-block; border-radius: 
			6px; background: #dddddd; height: 40px; width: 30px; margin-right: 3px; line-height: 
			40px; text-align: center; cursor: pointer;
		}
		.weekDays-selector input[type=checkbox]:checked + label { background: #2AD705; color: 
			#ffffff;
		}
		center.round2 { border: 2px solid red; border-radius: 8px; padding: 5px;
		}
		h1 { color: black;
		}
					
		/* toggle in label designing */ .toggle { position : relative ; display : inline-block; 
			width : 100px; height : 52px; background-color: red; border-radius: 30px; border: 
			2px solid gray;
		}
				
		/* After slide changes */ .toggle:after { content: ''; position: absolute; width: 50px; 
			height: 50px; border-radius: 50%; background-color: gray; top: 1px; left: 1px; 
			transition: all 0.5s;
		}
					
		/* Toggle text */ p { font-family: Arial, Helvetica, sans-serif; font-weight: bold;
		}
				
		/* Checkbox checked effect */ .checkbox:checked + .toggle::after { left : 49px;
		}
				
		/* Checkbox checked toggle label bg color */ .checkbox:checked + .toggle { 
			background-color: green;
		}
				
		/* Checkbox vanished */ .checkbox { display : none;
		}
		.btn { background-color: red; border: none; color: white; padding: 12px 16px; 
			font-size: 16px; cursor: pointer;
		}
		/* Darker background on mouse-over */ .btn:hover { background-color: black;
		}
		.button { background-color: #000000; /* Green */ border: none; color: white; 
			padding: 15px 32px; text-align: center; text-decoration: none; display: 
			inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; 
			-webkit-transition-duration: 0.4s; /* Safari */ transition-duration: 0.4s;
		}
		.button2:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 
			rgba(0,0,0,0.19);
		}
		.header{ width:100%; top:10px; position: absolute; display: inline-block;
		}
		.headerL{ float: left;
		}
		.headerR{ float: right; width:10%;
		}
		.full{ width: 100%; max-width: -webkit-fill-available; height: 100%; max-height: 
			-webkit-fill-available; top: 20%; margin-bottom: 100px;
			
		}
		.left{ width: 100%; margin-top:50px;
		}
		.right{ width: 100%; margin-top:50px;
		}
		#customers {
		  font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; 
		  font-size:20px;
		}
		
		#customers td, #customers th {
		  border: 1px solid #ddd; 
		  padding: 8px;
		  text-align: center;
		}
		
		#customers tr:nth-child(even){background-color: #f2f2f2;}
		
		#customers tr:hover {background-color: #ddd;}
		
		#customers th {
		  padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: 
		  #000000;
		  color: white;
		}
		.on {
		  height: 25px;
		  width: 25px;
		  background-color: #27fd4b;
		  border-radius: 50%;
		  display: inline-block;
		}
		.off {
		  height: 25px;
		  width: 25px;
		  background-color: #f51a1a;
		  border-radius: 50%;
		  display: inline-block;
		}
		</style> 
	</head> 
	<body> 
	<script>
	setInterval(function(){ 
		
		var passedArray = <?php echo json_encode($_SESSION['time']); ?>;
		var topic = <?php echo json_encode($_SESSION['title']); ?>;
		var day = <?php echo json_encode($_SESSION['day']); ?>;
				// Display the array elements
		for(var i = 0; i < passedArray.length; i++){
			var alarm = passedArray[i] ;
			var top = topic[i] ;
			var dayA = day[i] ;
			console.log(alarm);
			var today = new Date();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			today = today.toLocaleTimeString('en-GB');
			console.log(today);
			if(today==alarm)
			{
				document.getElementById("title").textContent = "Title : "+top;
				document.getElementById("time").textContent = "Time : "+alarm;
				document.getElementById("day").textContent = "Day : "+dayA;
				document.getElementsByClassName("toast__container")[0].style.visibility = "visible";

			}

			function initAlarm() {
				document.body.innerHTML = '';
			};
		}
	}, 1000);
	</script>
	<script> 
	function goBack() { window.history.back();
    }
    </script>
	<div class="toast__container">
	<div class="toast__cell">
	<div class="toast toast--green">
	  <div class="toast__icon">
		<svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
	<g><g><path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z"></path>
		</g></g>
		</svg>
	  </div>
	  <div class="toast__content">
		<p class="toast__type">Alarm Rings</p>
		<p class="toast__message" id="title">Title : Kunals.</p>
		<p class="toast__message" id="time">Time : .</p>
		<p class="toast__message" id="day">Day : .</p>
	  </div>
	  <div class="toast__close">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
	  <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
	</svg>
	  </div>
	</div>

	</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>	
	<div class="header"> 
		<div class="headerR"> 
			<label class="switch" style="margin-top: 7px;margin-right: 11px; ">
				<input type="checkbox" onclick="myFunction()"> 
				<span class="slider round" style="width: 3.5%;margin-right: 100px;height: 70%;margin-top: 7px;"></span>
            </label> 
		</div> 
		<div class="headerL">
			<a href="smarthome.php">
			<button class="btn" style="margin-top: 7px;margin-right: 11px; background-color:grey;">
				<i class="fa fa-home"></i>
			</button> 
			</a>
		</div> 
	</div> 
	<div class="full"> 
		<div class="left">
            <center> 
				<h1>Set Alarm</h1> 
				<form action="set.php" method="POST"> 
					<label for="appt">Enter Topic : </label> 
					<input type="text" name="topic" required> 
					<br>
					<label for="appt">Select a Day:</label> 
					<div class="weekDays-selector" style="display: contents;">
						<input type="checkbox" id="weekday-mon" class="weekday" name="M" value="Mon"/> 
						<label for="weekday-mon">M</label> 
						<input type="checkbox" id="weekday-tue" class="weekday" name="T" value="Tue"/> 
						<label for="weekday-tue">T</label> 
						<input type="checkbox" id="weekday-wed" class="weekday" name="W" value="Wed"/> 
						<label for="weekday-wed">W</label> 
						<input type="checkbox" id="weekday-thu" class="weekday" name="TR" value="Thu"/> 
						<label for="weekday-thu">T</label> 
						<input type="checkbox" id="weekday-fri" class="weekday" name="F" value="Fri"/> 
						<label for="weekday-fri">F</label> 
						<input type="checkbox" id="weekday-sat" class="weekday" name="S" value="Sat"/> 
						<label for="weekday-sat">S</label> 
						<input type="checkbox" id="weekday-sun" class="weekday" name="S" value="Sun"/> 
						<label for="weekday-sun">S</label>
					</div> <br> 
					<label for="appt">Select a time:</label> 
					<input type="time" id="appt" name="time" required> <br> 
					<input type="submit" class="button button2" name="submit" value="Submit">
				</form> 
			</center> 
		</div><br> 
		<div class="right"> 
		<center> 
			<h1 style="margin-top: auto;">Alarm List</h1> 
<?php 
    include "connection.php";
	$queryGet = "select * from alarm"; 
	$resultGet = mysqli_query($link,$queryGet); 
	if(!$resultGet) {
		die ("Invalid Query - get Items List: ". mysqli_error($link));
	}
	else {?> <table id="customers"> 
				<tr> 
					<th style="width:5%">Status</th>
					<th>Topic</th> 
					<th style="width:15%">Time</th> 
					<th>Day</th> 
                    <th>Action</th>
                </tr> 
<?php 
	while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
	{
		$array = explode(',', $row['day']);	

		$day = implode(" ", $array);			
?>
                <tr> 
					<td><?php if($row['status']==1) echo '<span class="on"></span>';
							  else echo '<span class="off"></span>';
					?>
					</td> 
					<td><?php echo $row['topic']?></td> 
					<td><?php echo $row['time']?></td> 
					<td><?php echo $day;?></td> 
					<td>
					    <a href="set.php?sid=<?php echo $row['id'];?>" >
						<img border="0" alt="editB" src="offB.png" width="25" height="25"></a></a>
						<a href="set.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')">
						<img border="0" alt="editB" src="delB.png" width="25" height="25"></a></a>
					</td>
                </tr> 
<?php }?> 	</table> 
<?php }?> 
		</center> 
		</div> 
	</div> 
</body> 
</html>
