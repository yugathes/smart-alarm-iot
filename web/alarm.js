setInterval(function(){ 
		var alarmTimer;
		var passedArray = <?php echo json_encode($_SESSION['time']); ?>;
		var topic = <?php echo json_encode($_SESSION['title']); ?>;
				// Display the array elements
		for(var i = 0; i < passedArray.length; i++){
			var alarm = passedArray[i] ;
			var top = topic[i] ;
			console.log(alarm);
			var today = new Date();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			today = today.toLocaleTimeString('en-GB');
			console.log(today);
			if(today==alarm)
			{
				document.getElementById("title").textContent = "Title : "+top;
				document.getElementsByClassName("toast__container")[0].style.visibility = "visible";

			}
			//alarmTimer = setTimeout(initAlarm, differenceInMs);

			function initAlarm() {
				document.body.innerHTML = '';
			};
		}
	}, 1000);