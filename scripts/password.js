
var match_event = document.getElementById('pmatch');
var match = document.getElementById('pmatch');
var password = document.getElementById('pword');
var submit_button = document.getElementById('create_btn');
var passblock = document.getElementById("passblock");

match_event.addEventListener('input', function () {

	if(password.value == match.value){
		submit_button.setAttribute("type", "submit");
		passblock.setAttribute("style", "display: hidden");
		console.log("match");

	}else{
		submit_button.setAttribute("type", "button");
		passblock.setAttribute("style", "display: block");
		console.log("no");
	}



});

