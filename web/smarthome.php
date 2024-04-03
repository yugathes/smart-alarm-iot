<?php
 error_reporting(E_ALL);
 session_start();
 //get ip adress
 $ip = $_SERVER['SERVER_ADDR'];
if(isset($_GET['lightS'])){
	if($_GET['lightS']==0){
		echo "<style> 
		.light{	
			background-color: greenyellow!important;
		}</style>";
		$_SESSION['light'] = $_GET['lightS'];
	}
	if($_GET['lightS']==1){
		echo "<style> 
		.light{	
			background-color: white!important;
		}</style>";
		$_SESSION['light'] = $_GET['lightS'];
	}
}
if(isset($_GET['fanS'])){
	if($_GET['fanS']==1){
		echo "<style> 
		.fan{	
			background-color: greenyellow!important;
		}</style>";
		$_SESSION['fan'] = $_GET['fanS'];
	}
	if($_GET['fanS']==0){
		echo "<style> 
		.fan{	
			background-color: white!important;
		}</style>";
		$_SESSION['fan'] = $_GET['fanS'];
	}
}
if(isset($_SESSION['light'])){
	if($_SESSION['light']==0){
		echo "<style> 
		.light{	
			background-color: greenyellow!important;
		}</style>";	
	}
	if($_SESSION['light']==1){
		echo "<style> 
		.light{	
			background-color: white!important;
		}</style>";	
	}
}
if(isset($_SESSION['fan'])){ 	
	if($_SESSION['fan']==1){
		echo "<style> 
		.fan{	
			background-color: greenyellow!important;
		}</style>";	
	}
	if($_SESSION['fan']==0){
		echo "<style> 
		.fan{	
			background-color: white!important;
		}</style>";	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Smart Home Alarm System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="./style.css">
	<script>
	function myFunction() {
	   var element = document.body;
	   element.classList.toggle("dark-mode");

	}
	</script>
	<style type="text/css">
	.switch {
		position: absolute;
		top: 0;
		right: 0;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input { 
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}

	body {
	  padding: 25px;
	  background-color: white;
	  color: black;
	  font-size: 25px;
	}

	.dark-mode {
	  background-color: black;
	  color: white;
	}
	.clock{
		position: fixed;
		top: 35%;
		left: 50%;
		transform: translateX(-50%) translateY(-50%);
		font-size: 100px;
		padding: 0px 5px 0px 5px;
	}

	.button {
	  background-color: #4CAF50; /* Green */
	  border: none;
	  color: white;
	  padding: 16px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: 4px 2px;
	  transition-duration: 0.4s;
	  cursor: pointer;
	}
	.button5 {
	  background-color: white;
	  color: black;
	  border: 2px solid #555555;
	}

	.button5:hover {
	  background-color: #555555;
	  color: white;
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
    <div id="MyClockDisplay" class="clock">
    </div>
    <label class="switch" style="margin-top: 7px;margin-right: 11px;">
      <input type="checkbox" onclick="myFunction()">
      <span class="slider round"></span>
    </label>

    <script type="text/javascript">
    function showTime(){
    	var date = new Date();
    	var h = date.getHours(); // 0 - 23
    	var m = date.getMinutes(); // 0 - 59
    	var s = date.getSeconds(); // 0 - 59
    	var session = "AM";
    	
    	if(h >= 12){
    		h = h - 12;
    		session = "PM";
    	}
    
    	if(h == 0){
    		h = 12;
    	}
    
    
    	h = (h < 10) ? "0" + h : h;
    	m = (m < 10) ? "0" + m : m;
    	s = (s < 10) ? "0" + s : s;
    
    	var time = h + ":" + m + ":" + s + " " + session;
    	document.getElementById("MyClockDisplay").innerText = time;
    	document.getElementById("MyClockDisplay").textContent = time;
    
    	setTimeout(showTime, 1000);
    }
    
    showTime();
    
    </script>
    <!-- GET method -->
    <a class="button button5 light" href="http://<?php echo $ip;?>:5000/light">Light</a>
    <a class="button button5 fan" href="http://<?php echo $ip;?>:5000/fan">Fan</a>
	<a class="button button5" href="http://<?php echo $ip;?>:5000/night">Good Night mode</a>
	
	<div class="container">  
		<a class="button button5" style="font-size : 15px;margin-left:auto;width:20%;margin-right:auto;display:block;margin-top:22%;margin-bottom:0%" href="setalarm.php">
			Set Alarm
		</a>
	</div>
</body>
</html>
