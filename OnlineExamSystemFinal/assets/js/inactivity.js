function my() {	
		var timeleft = 600; //600 is 10mins
		var checkMouseOver = document.getElementById("myBody").onmouseover = function() {
		timeleft = 600; // assigning the limit time again after user moving curser 
		};
		var downloadTimer = setInterval(function(){
		timeleft--;
			if(timeleft <= 0  && checkMouseOver !=0 )
			{ 	
				window.location.href = "logout.php";
				alert("You've been away for a long time. You need to sign in again");
			}
		},1000);
	}