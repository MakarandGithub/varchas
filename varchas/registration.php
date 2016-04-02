<?php
require 'connect.php';
$first_name = $last_name = $email = $phonenumber = $institute = $city = $sport = $AlRegMail = $team = $amount "";
$InvalidEntries = $sql_error = $registered = $mailAlReg = false;
if(isset($_POST['first_name']) && isset($_POST['last_name']) && 
   isset($_POST['email']) && isset($_POST['phonenumber']) && 
   isset($_POST['institute']) && isset($_POST['city']) && 
   isset($_POST['sport'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$email = str_replace(' ','',$email);
	$phonenumber = $_POST['phonenumber'];
	$institute = $_POST['institute'];
	$city = $_POST['city'];
        $team = $_POST['team'];	

	$sport = $_POST['sport'];
	if((!empty($email) && !empty($sport))
	{
		$q = "SELECT `sport`,`email` FROM `Varchas15`";
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
					
				    
						
				    
				  }
				  if($mailAlReg)
					break;
				}
			}
		}
	}
	if(!$mailAlReg && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($phonenumber) && !empty($institute) && !empty($city) && !empty($sport) && !empty($team))
	{
		/*$query = "INSERT INTO `Varchas15` VALUES ('','".mysql_real_escape_string($sport)."','".mysql_real_escape_string($first_name)."','".mysql_real_escape_string($last_name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($phonenumber)."','".mysql_real_escape_string($institute)."','".mysql_real_escape_string($city)."','".mysql_real_escape_string($othermembers)."')";
                 $query_run = mysql_query($query)
		if($query_run)
		{	
			$first_name = $last_name = $email = $phonenumber = $institute = $city = $othermembers = "";
			$registered = true;
		}
		else
		{
			$sql_error = true;
		}*/

/*edited*/
        /****/
$query = "INSERT INTO `Varchas15` VALUES ('".mysql_real_escape_string($final_id)."','".mysql_real_escape_string($sport)."','".mysql_real_escape_string($first_name)."','".mysql_real_escape_string($last_name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($phonenumber)."','".mysql_real_escape_string($institute)."','".mysql_real_escape_string($city)."','".mysql_real_escape_string($team)."','".mysql_real_escape_string($amount)."')";
                 $query_run = mysql_query($query)
		if($query_run)
		{	
			$first_name = $last_name = $email = $phonenumber = $institute = $city = $team = $amount "";
			$registered = true;
		}
		else
		{
			$sql_error = true;
		}
/********************************************************/               



                        $get_last_id = "SELECT id FROM Varchas15 ORDER BY id DESC LIMIT 1";
			$last_id = mysqli_query($get_last_id);
			$ids = mysqli_fetch_array($last_id);
			if(!isset($ids[0])){
				$ids[0] = 150000;
			}else{
				$ids[0] = substr($ids[0], 2);
			}
			$up_idnumber=$ids[0]+1;
			$final_id="VCH".$up_idnumber;

			$amount = 0;
                        $amount = $amount + 1325 * $team;

			/*if($city){
				$accomodation_require = 0;
				if($no_of_days == 4){
					$amount = $amount +250;
				}else{
					$amount = $amount + (70 * $no_of_days);   //70 per day
				}
			}else{
				$amount = $amount + 250;        //250 for 4 days
				if($accomodation_require){
					$amount = $amount + 600;		//acc = 500 + 100
				}
			}*/
                        


               /*if($query_run)
			{
				require("class.phpmailer.php");
				$mail = new PHPMailer();
				$mail->IsSMTP();             // set mailer to use SMTP
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "";  // SMTP username
				$mail->Password = ""; // SMTP password
				$webmaster_email = ""; 
				$email="$emailme";
				$name= $first_name.' '.$last_name;
				$mail->From = $webmaster_email;
				$mail->FromName = "Varchas 15";
				$mail->AddAddress($email,$name);
				$mail->AddReplyTo($webmaster_email, $mail->FromName);

				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("jitu.JPG");         
// add attachments

				$mail->IsHTML(true);                                  // set email format to HTML

				$mail->Subject = "Registration mail confirmation form Varchas'15";
				$mail->Body    = "Dear $first_name $last_name,<br>Thanks for registration.You have been registered sucessfully for <b>Varchas 2015</b><br><br>Your details are as below:<br>Varchas Number:<b> $final_id</b><br><br><b>Note: </b>Please keep your Varchas Number for further requirments.<br> You can register for any event in Varchas using your Varchas Number.<br> Hope to see you at Varchas 2015: 29th Sept - 1st Oct.<br>Login and update your details at the Varchas confirmation portal: http://www.iitj-varchas.org/<br>For further updates, Like our Facebook page: http://www.facebook.com/Varchas.iitj <br><br>Regards, <br><b>Team Varchas'15</b> <br> http://Varchas.org";
				$mail->AltBody = "Thanks for registration.You have been registered sucessfully for Varchas'15.<br>Your details are as below:<br>Varchas Number:<b> $final_id</b>";

				if(!$mail->Send())
				{
   					echo "Message could not be sent. <p>";
   					echo "Mailer Error: " . $mail->ErrorInfo;
   					exit;
				}

				echo "Message has been sent";
				header("location:thanks.php");
			}
			else
				header("location:sorry.php");

                         */
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
<form action="" method="post">
<script>var members_no = 0;</script>
	<div id = "outer">
		<div id="page_title">
			Registration
		</div>
		<div id="form_outer">
			<div id="form_inner">
				<label for="sport"><font size="2.9em">Select your sport :</font></label>
				<select name = "sport" required = "required">
					<option value="">Select Sport</option>
					<option value="Cricket">Cricket</option>
					<option value="BasketBall">Basket-Ball(Boys)</option>
					<option value="BasketBall">Basket-Ball(Girls)</option>
					<option value="VolleyBall">Volley-Ball(Boys)</option>
					<option value="VolleyBall">Volley-Ball(Girls)</option>
					<option value="Badminton">Badminton(Boys)</option>
					<option value="Badminton">Badminton(Girls)</option>
					<option value="TableTennis">Table Tennis</option>
                                       	<option value="Chess">Chess</option>
					<option value="FootBall">Foot-ball</option>
					<option value="Squash">Squash</option>
					<option value="TableTennis">Online Gaming</option>
					<option value="Tennis">Tennis</option>
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
                                                        <div class="input-field col s3 m3 l3">
								<input id="team" type="text" name="team" value="<?php echo $team; ?>" required="required" title="Number of Players">
								<label for="team">Total Number of players in the team</label>
							</div>
							<!--<div class="text-field col s12 m12 l12">
								<label for="othermembers"><font size="3.0em">Other Members detail as (NAME,EMAIL,PHONE_NO), seperated each student detail by semicolon('<font color="red"><b>,</b></font>')<br>(If any)</font></label>
								<textarea id="othermembers" style="height:100px;" cols="29" name="othermembers" title="Other Members detail as (NAME, EMAIL, PHONE_NO)"></textarea>>
                                                        
							</div-->
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
									location.replace('index.php');
								text = \"You have been Successfully Registered.<br><font color='red'>Note: This page will be automatically reloaded in \"+ s + \" seconds. </font>\";
								document.getElementById('form_inner').innerHTML = text;
							}
						</script>";
					//$sec = 5;
					//$page = 'index.php';
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
		</div>
	</div>
	<script src="js/default.js"></script>
	<script src = "js/jquery-2.1.1.min.js"></script>
	<script src = "js/materialize.js"></script>
</form>	
</body>
</html>
