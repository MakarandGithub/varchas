
<?php
require 'connect.php';
$first_name = $last_name = $email = $phonenumber = $institute = $city = $sport = $team = $AlRegMail = "";
$InvalidEntries = $sql_error = $registered = $mailAlReg = false;
if(isset($_POST['first_name']) && isset($_POST['last_name']) && 
   isset($_POST['email']) && isset($_POST['phonenumber']) && 
   isset($_POST['institute']) && isset($_POST['city']) && 
   isset($_POST['sport']) && isset($_POST['team']) ) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$email = str_replace(' ','',$email);
	$phonenumber = $_POST['phonenumber'];
	$institute = $_POST['institute'];
	$city = $_POST['city'];
    $team = $_POST['team'];
	$sport = $_POST['sport'];
	if((!empty($email)) && !empty($sport))
	{
		$q = "SELECT `sport`,`email` FROM `v15`";
		if($q_run = mysql_query($q))
		{
			$qnorows = mysql_num_rows($q_run);
			if($qnorows != 0)
			{
				
				while($qrows = mysql_fetch_assoc($q_run))
				{
					$e = $qrows['email'];
					$s = $qrows['sport'];
				  if($s == $sport)
				  {
					if($e == $email)
					{
						$mailAlReg = true;
						$AlRegMail = $email;
						break;
					}
					/*
				    if( !$mailAlReg)
				    {
						foreach($curr_om as $curr_ome_)
						{
							$curr_ome = explode(',',$curr_ome_);
							$ome = implode(array_slice($curr_ome,1,1));
							$ome = str_replace(' ','',$ome);
							if($ome != "")
							{
								
									$q_ = "SELECT * FROM `v15` WHERE `email` LIKE '%".$ome."%'";
									$qr = mysql_query($q_);
									$qnr = mysql_num_rows($qr);
									if($qnr != 0)
									{
										$mailAlReg = true;
										$AlRegMail = $ome;
										break;
									}
								
							}
						}
				    }*/
				  }
				  if($mailAlReg)
					break;
				}
			}
		}
	}
	if(!$mailAlReg && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($phonenumber) && !empty($institute) && !empty($city) && !empty($sport) && !empty($team))
	{
		$vID = "";
		$q = "SELECT `vID` FROM `v15` ORDER BY `vID` DESC LIMIT 1";
		
		if($qrun = mysql_query($q))
		{
			$rows = mysql_num_rows($qrun);
			if($rows != 0)
			{
				while($qrow = mysql_fetch_assoc($qrun))
				{
					$vid = $qrow['vID'];
					$_vid = substr($vid,5);
					$vidint = intval($_vid);
					$vID = "VCH15".sprintf("%04d",$vidint+1);
				}
			}
			else
				$vID = "VCH150001";
		}
		else
			$vID = "VCH150000";
		
		$query = "INSERT INTO `v15` VALUES ('','".mysql_real_escape_string($sport)."','".mysql_real_escape_string($first_name)."','".mysql_real_escape_string($last_name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($phonenumber)."','".mysql_real_escape_string($institute)."','".mysql_real_escape_string($city)."','".mysql_real_escape_string($team)."','".mysql_real_escape_string($vID)."','".mysql_real_escape_string("nyc")."')";
		
		if($query_run = mysql_query($query))
		{	
                        $to=$email;
                        $from="pr_varchas@iitj.ac.in";
                        $cc="ug201313023@iitj.ac.in";
                        $subject="Registration mail confirmation form VARCHAS'15";
                        $msg= "Dear ".$first_name." ".$last_name.",\nThanks for registration.You have been registered sucessfully for VARCHAS 2015\n\nYour details are as below:\nVARCHAS ID: ".$vID."\nEmail Address: ".$email." \nNote: Please keep your VARCHAS ID for further requirments.\nPlease contact the PR Heads regarding confirmation and payment procedure.\n\nHope to see you at VARCHAS 2015: 29th Oct'15 - 1st Nov'15.\n\nFor further updates, Like our Facebook page: https://www.facebook.com/Varchas.IITRajasthan?fref=ts \n\nRegards, \nTeam VARCHAS'15\nhttp://iitj-varchas.org";
                        $headers = "From: $from" . "\r\n" .
"CC: $cc";
                       mail($to,$subject,$msg,$headers);
			$first_name = $last_name = $email = $phonenumber = $institute = $city = $team = "";
			$registered = true;
		}
		else
		{
			$sql_error = true;
		}
		
	}
	else
	{
		$InvalidEntries = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Varchas '15</title>
    <!-- CSS-->
    <link href="css/regstyle.css" type="text/css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet"> 
    <link href="css/material-icons.css" rel="stylesheet"> 
	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
<body>
<form action="" name="regForm" id="regForm" method="post">
<script>var members_no = 0;</script>
	<div id = "outer">
		<div id="page_title">
			Registration Closed.
		</div>
		<!--div id="form_outer">
			<div id="form_inner">
				<label for="sport"><font size="2.9em">Select your sport :</font></label>
				<select name = "sport" required = "required">
					<option value="">Select Sport</option>
                                        <option value="Athletics">Athletics</option>
					<option value="Cricket">Cricket</option>
					<option value="BasketBall">Basket-Ball</option>
                                        <option value="BasketBall(women)">Basket-Ball(women)</option>
					<option value="VolleyBall">Volley-Ball</option>
					<option value="VolleyBall(women)">Volley-Ball(women)</option>
					<option value="Badminton">Badminton</option>
					<option value="Badminton(women)">Badminton(women)</option>
					<option value="TableTennis">Table Tennis</option>
					<option value="TableTennis(women)">Table Tennis(women)</option>
					<option value="Chess">Chess</option>
					<option value="FootBall">Foot-ball</option>
					<option value="Squash">Squash</option>
					<option value="Online Gaming">Online Gaming</option>
					<option value="Tennis">Tennis</option>
					<option value="Tennis">Tennis(women)</option>
					<option value="WeightLifting">Weight-Lifting</option>
				</select>
				<br><br>
				<div class="row">
					<h6 class="team_leader">Team Leader :</h6>
					<form class="col s12">
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<input id="first_name" type="text" name="first_name" value="<?php echo $first_name; ?>" required="required" pattern="[A-Za-z ]{1,30}" title="First Name: Only Letters and Spaces" size="30">
								<label for="first_name">First Name</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<input id="last_name" type="text" name="last_name" value="<?php echo $last_name; ?>" required="required" pattern="[A-Za-z ]{1,30}" title="Last Name: Only Letters and Spaces" size="30">
								<label for="last_name">Last Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<input id="email" type="email" class="validate" name="email" value="<?php echo $email; ?>" required="required" title="Email ID" size="50">
								<label for="email" data-error="wrong" data-success="right">Email</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<input id="phone" type="tel" name="phonenumber" value="<?php echo $phonenumber; ?>" required="required"  placeholder="Phone Number : 10 digit" pattern="[0-9]{1,20}" title="Numbers only">
								<label for="phone">Phone Number</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s9 m9 l9">
								<input id="institute" type="text" name="institute" value="<?php echo $institute; ?>" required="required" title="Institute Name">
								<label for="institute">Institute</label>
							</div>
							<div class="input-field col s3 m3 l3">
								<input id="city" type="text" name="city" value="<?php echo $city; ?>" required="required" title="City Name">
								<label for="city">City</label>
							</div>
						</div>
						<div class="row">
							<div class="text-field col s12 m12 l12">
						        <div class="input-field col s12 m6 l6">
								<input id="team" type="text" name="team" value="<?php echo $team; ?>" required="required" pattern="{1,30}" title="Total Number of team members" size="30">
								<label for="team">Total number of Team Members</label>
							</div>
							</div>
						</div>
					</form>
				</div>
				<button class="btn waves-effect waves-light tooltipped" type="submit" name="action" data-position="top" data-delay="700" data-tooltip="Click here to Register">Register</button>
			</div>
				<p><?php 
				if($InvalidEntries && !$mailAlReg)
					echo "<font color='red'>Please enter valid entries!</font>"; 
				else if($registered)
				{
					echo "<script type=\"text/javascript\">
							var s = 5;
							text = \"You have been Successfully Registered.<br><font color='red'>Note: This page will be automatically reloaded in \"+s+\" seconds. </font>\";
							document.getElementById('form_inner').innerHTML = text;
							var t = setInterval(function(){Timer()},1000);
							function Timer() {
								if(s!=0)
									s = s-1;
								else
									location.replace('reg.php');
								text = \"You have been Successfully Registered.<br><font color='red'>Note: This page will be automatically reloaded in \"+ s + \" seconds. </font>\";
								document.getElementById('form_inner').innerHTML = text;
							}
						</script>";
					//$sec = 5;
					//$page = 'registration.php';
					//header("Refresh: $sec; url= $page");
				}
				else if($mailAlReg)
				{
					echo "<font color='red'>Mail : '".$AlRegMail."' is already registered in '".$sport."'.</font>";
					//echo "<script>document.getElementById('othermembers').innerHTML='".$othermembers."'</script>";
				}
				else if($sql_error)
					echo mysql_error();
				else
					echo "";
				$allFieldEmpty=$sql_error=$registered=$mailAlReg=false;
				?></p> 
		</div-->
	</div>
<script type="text/javascript" language="JavaScript">
<!-- Copyright 2006 Bontrager Connection, LLC
function FillForm() {
// Specify form's name between the quotes on next line.
var FormName = "regForm";
var questionlocation = location.href.indexOf('?');
if(questionlocation < 0) { return; }
var q = location.href.substr(questionlocation + 1);
var list = q.split('&');
for(var i = 0; i < list.length; i++) {
   var kv = list[i].split('=');
   if(! eval('document.'+FormName+'.'+kv[0])) { continue; }
   kv[1] = unescape(kv[1]);
   if(kv[1].indexOf('"') > -1) {
      var re = /"/g;
      kv[1] = kv[1].replace(re,'\\"');
      }
   eval('document.'+FormName+'.'+kv[0]+'.value="'+kv[1]+'"');
   }
}
FillForm();
//-->
</script>

	<script src="js/default.js"></script>
	<script src = "js/jquery-2.1.1.min.js"></script>
	<script src = "js/materialize.js"></script>
</form>	
</body>
</html>
