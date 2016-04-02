<?php

require 'connect.php';

$invalid=$valid=false;
$varID="";
if(isset($_POST['varID']) && isset($_POST['accomodation']))
{
   $accomodation = $_POST['accomodation'];
   $varID = $_POST['varID'];
   $query2 = "SELECT * FROM paymentids"; //You don't need a ; like you do in SQL 
   $result2 = mysql_query($query2);

   $q = "SELECT `varchasid` FROM `paymentids`";
		if($q_run = mysql_query($q))
		{
			$qnorows = mysql_num_rows($q_run);
			if($qnorows != 0)
			{
				
				while($qrows = mysql_fetch_assoc($q_run))
				{
					$id = $qrows['varchasid'];

					if($id == $varID)
					{$invalid=false;
                                         $valid=true;
                                          break;}
                                         else{$invalid=true;$valid=false;}
					
				  
				 
				  }
			}
		} 


  
}?>

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
<form action="" method="POST" name="payForm" id="payForm">
<script>var members_no = 0;</script>
	<div id = "outer">
		<div id="page_title">
			Payment
		</div>
		<div id="form_outer">
			<div id="form_inner">
				<label for="accomodation"><font size="2.9em">Accomodation Required :</font></label>
				<select name = "accomodation" required = "required">	
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<br><br>
				<div class="row">

					<form class="col s12">
						<div class="row">
							<div class="text-field col s12 m12 l12">
						        <div class="input-field col s12 m6 l6">
								<input id="varID" type="text" name="varID" value="<?php echo $varID; ?>" id="varID" required="required" title="varID" size="9">
								<label for="varID">Varchas ID</label>


							</div>
							</div>
						</div>
					</form>
				</div>
				<button class="btn waves-effect waves-light tooltipped" type="submit" name="action" data-position="top" data-delay="700" data-tooltip="Click here to Proceed">OK</button>
			</div>
<?php
   if($invalid)
    {
	echo "<font color='red'>Please  re-check Varchas ID or contact our PR team !</font>";
    }
    if($valid)
    {
                    
    header("Location: payment.php?varID=".$varID."&&accomodation=".$accomodation."");
    
					
     }

?>
		</div>
	</div>

<script type="text/javascript" language="JavaScript">
<!-- Copyright 2006 Bontrager Connection, LLC
function FillForm() {
// Specify form's name between the quotes on next line.
var FormName = "payForm";
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
