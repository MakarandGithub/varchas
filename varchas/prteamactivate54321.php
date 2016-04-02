<?php
require 'connect.php';
$varchasid = $alid = "";
$InvalidEntries = $sql_error = $registered = $mailAlReg = false;
if(isset($_POST['varchasid']) ) {
	$varchasid = $_POST['varchasid'];
	if((!empty($varchasid)))
	{
		$q = "SELECT `varchasid` FROM `paymentids`";
		if($q_run = mysql_query($q))
		{
			$qnorows = mysql_num_rows($q_run);
			if($qnorows != 0)
			{
				
				while($qrows = mysql_fetch_assoc($q_run))
				{
					$id = $qrows['varchasid'];

					if($id == $varchasid)
					{
						
						$alid = true;
						break;
					}
					
				  
				 
				  }
			}
		}
	}
	if(!$alid && !empty($varchasid))
	{
		
		$query = "INSERT INTO `paymentids` VALUES ('".mysql_real_escape_string($varchasid)."')";
		
		if($query_run = mysql_query($query))
		{	
                        $updated = true;
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
			Payment Activation
		</div>
		<div id="form_outer">
			<div id="form_inner">
				
				<div class="row">
					<h6 class="team_leader">Activate the required ID :</h6>
					<form class="col s12">
						
						<div class="row">
							<div class="text-field col s12 m12 l12">
						        <div class="input-field col s12 m6 l6">
								<input id="varchasid" type="text" name="varchasid" value="<?php echo $varchasid; ?>" required="required" title="Varchas ID to be activated" size="9">
								<label for="varchasid">Varchas ID</label>
							</div>
							</div>
						</div>
					</form>
				</div>
				<button class="btn waves-effect waves-light tooltipped" type="submit" name="action" data-position="top" data-delay="700" data-tooltip="Click here to Activate">Activate</button>
			</div>
				<p><?php 
				if($InvalidEntries && !$alid)
					echo "<font color='red'>Please enter valid entries!</font>"; 
				else if($updated)
				{
					echo "<script type=\"text/javascript\">
							var s = 2;
							text = \"ID Activated.<br><font color='red'>Note: This page will be automatically reloaded in \"+s+\" seconds. </font>\";
							document.getElementById('form_inner').innerHTML = text;
							var t = setInterval(function(){Timer()},1000);
							function Timer() {
								if(s!=0)
									s = s-1;
								else
									location.replace('prteamactivate54321.php');
								text = \"ID activated.<br><font color='red'>Note: This page will be automatically reloaded in \"+ s + \" seconds. </font>\";
								document.getElementById('form_inner').innerHTML = text;
							}
						</script>";
					
				}
				else if($alid)
				{
					echo "<font color='red'>Varchas ID : '".$varchasid."' is already activated.</font>";
					//echo "<script>document.getElementById('othermembers').innerHTML='".$othermembers."'</script>";
				}
				else if($sql_error)
					echo mysql_error();
				else
					echo "";
				        $sql_error=$updated=$alid=false;
				?></p> 
		</div>
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
