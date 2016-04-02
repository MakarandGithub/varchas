<?php
	$url = 'img/ty.jpg';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
 
<html lang="en">
<head>
	<title>Thanks for Registration</title>

<style type="text/css">
#background {
    width: 100%; 
    height: 100%; 
    position: fixed; 
    left: 0px; 
    top: 0px; 
    z-index: -1; /* Ensure div tag stays behind content; -999 might work, too. */
}

.stretch {
    width:100%;
    height:100%;
}
h1{
color:#000;
font-size:25 px;
text-align:center;
}
h2{
color:#000052;
font-size:20 px;
text-align:center;
}
#countDown{
color:#500;
font-size:30px;

}
h5
{
text-align:center;
font-size:25px;

}

</style>
<script type="text/javascript">
window.onload = function() {
/*	set your parameters(
number to countdown from, 
pause between counts in milliseconds, 
function to execute when finished
) 
*/
startCountDown(10, 1000, myFunction);
}

function startCountDown(i, p, f) {
//	store parameters
var pause = p;
var fn = f;
//	make reference to div
var countDownObj = document.getElementById("countDown");
if (countDownObj == null) {
//	error
alert("div not found, check your id");
//	bail
return;
}
countDownObj.count = function(i) {
//	write out count
countDownObj.innerHTML = i;
if (i == 0) {
//	execute function
fn();
//	stop
return;
}
setTimeout(function() {
//	repeat
countDownObj.count(i - 1);
},
pause
);
}
//	set it going
countDownObj.count(i);
}

function myFunction() {

}
</script>
</head>

<body>
<div id="background">
    <img src="<?php echo $url;?>" class="stretch" alt="" />
</div>
<br><br><br><br><br><br><h1>Thank you for registering with Varchas 2015.<br>Your registration has been successfully completed.</h1><br>
<h2>We hope to see you there at the festival! You will receive an email shortly providing your ID Number and other details.</h2><br>
<h5>Please Wait... This page will redirect in <span id="countDown"></span> seconds.</h5>
</body>
</html>
<?php 
header("Refresh: 10;index.html");
?>
