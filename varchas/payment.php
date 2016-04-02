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


<?php
require 'connect.php';

$InvalidEntries = $sql_error = $check  = false;


/*$q = "SELECT `varchasid` FROM `paymentids`";
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
                                         else{$invalid=true;$valid=false;$InvalidEntries=true;}
					
				  
				 
				  }
			}
		} */

if(isset($_GET['accomodation']) && isset($_GET['varID'])) 
{
	$accomodation = $_GET['accomodation'];
        $varID = $_GET['varID'];
	if((!empty($accomodation)) && !empty($varID))
	{
		$q = "SELECT * FROM v15 WHERE vID='$varID' ";
		if($q_run = mysql_query($q))
		{
			$qnorows = mysql_num_rows($q_run);
			if($qnorows != 0)
			{
				$parRow = mysql_fetch_assoc($q_run);

                                $sname=$parRow['sport'];
                                $fname=$parRow['first_name'];
                                $lname=$parRow['last_name'];
                                $e=$parRow['email'];
                                $pnum=$parRow['phonenumber'];
                                $i=$parRow['institute'];
                                $city=$parRow['city'];
                                $tnum=$parRow['team'];  
                                
                                
			}
                        else
	                {
	                 	$InvalidEntries = true;
	                }
		}
	}
	if(!empty($accomodation) && !empty($varID))
	{
                
		$query = "UPDATE v15 SET accomodation = '$accomodation' WHERE vID = '$varID'";
		if($accomodation == "yes")
                {$to_pay=$tnum*1325;
                 $acc=1325;}
                else
                {$to_pay=$tnum*525;
                 $acc=525;}


                 
                if($query_run = mysql_query($query))
		{	
			
			$check = true;
		}
		else
		{
			$sql_error = true;
		}
	}
	
}

if(isset($_POST['livemethodname']))
{
	if($_POST['livemethodname']=='Payment')
	{
		$secret_key="f59ycg3iwb384cxrxd0mtwktrjybke29gieed0z10egeqaorey"; 
		$api_key="mu7tbx3jiwt2csorlzp6afssimb1emi60n0khyv3xtuik9sdpv";   
		$api_url="http://thecollegefever.com/tcfwebapi/api/thecollegefever_api.php"; 
		$pageURL = 'http';
		$pageURL.= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL.= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		  $pageURL.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		} 
		$data = array(                         
			"secret_key"=>$secret_key,
			"api_key"=>$api_key,
			"client_id"=>"6Uyfpq", 
			"task"=>"make_payment",                      
	        "user_name"=>$fname." ".$lname,                          
	        // User name                       
		    "user_uid"=>$varID,                           
		    // User Unique ID Number                      
		    "user_email"=>$e,                         
		    // User Email Address (to get Ticket)
		    "user_contact_number"=>$pnum,                
		    // User Contact Number
		    "user_gender"=>"from sports",                        
		    // User Gender              
		    "user_college_name"=>$i,                  
		    // User Collge Name              
		    "user_pursuing_year"=>"Under-Graduate",                 
		    // User Pursuing Year
		    "user_address"=>$city,                       
		    // User Address
		    "user_event_registered"=>$sname,              
		    // User registered event(Example :General Fees,Accomodation)
		    "user_event_charge"=>$to_pay,                  
		    // Per Event charge (Example : 1,2)             
		    "user_event_total_amount"=>$to_pay,            
		    // Total Charge (Example: 3)
		    "user_acomdation_status"=>$accomodation,             
		    // User Accomdation Status
		    "user_arrival_date"=>"2015-10-29",                  
		    // User Arrival Date              
		    "user_departure_date"=>"2015-11-01",                
		    // User Departure Date
		    "event_logo"=>"http://thecollegefever.com/tcfwebapi/images/logo.png",                         
		    // Event Logo        
		    "event_admin_email"=>"ug201313023@iitj.ac.in",                  
		    // Event admin email (to get user notification Ticket)        
		    "event_name"=>"VARCHAS15",                         
		    // Event Name
		    "event_college_name"=>"IIT Jodhpur",                 
		    // Event College Name
		    "event_address"=>"IIT Jodhpur, Jodhpur(Raj.)",                      
		    // Event Address    
                   "event_date"=>"2015-10-29",                      
		    // Set Event Date
                   "orgnaniser_details"=>"IIT Jodhpur",                      
		    // Orgnaniser Details
                    "home_page_url"=>"iitj-varchas.org",
		    //Set Go back to Home Page URL
		    "url_origin"=>$pageURL

	    );
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $api_url,
			CURLOPT_USERAGENT => 'Curl Request for making payment',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS =>$data
		));
		$response = curl_exec($curl);
		echo $response;
	}	
}
?> 


<?php
				if($InvalidEntries)
					echo "<font color='red'>Please enter valid entries!<br>Contact our PR team for assistance!</font>";
                                       /* echo '<font color =\'red\'><a href="iitj-varchas.org"><p>Varchas Main Page</p></a>'; */
				else if($check)
				{?>


<form action='' method="POST">
<script>var members_no = 0;</script>
	<div id = "outer">
		<div id="page_title">
			Payment
		</div>
		<div id="form_outer">
			<div id="form_inner">
				 <form action='' method='POST'> <!--form action="colpay1.php"--><div class="det"><font color='red' size="5%"><p>Check your details and click the Pay button :</p></font><table>
                                                    <tr>
                                                 <td>Varchas ID</td>
                                                 <td>:</td>
						<input name="varID" value = "<?php echo $varID?>" type="hidden">
                                                 <td><?php echo $varID?></td>
                                               </tr>
                                              <tr>
                                                 <td>Name</td>
                                                 <td>:</td>
                                                 <td><?php $parname=$fname." ".$lname; echo $parname?></td>
						<input name="parname" value = "<?php echo $parname?>" type="hidden">
                                               </tr>
                                              <tr>
                                                 <td>Event</td>
                                                 <td>:</td>
                                                 <td><?php echo $sname?></td>
						<input name="sname" value = "<?php echo $sname?>" type="hidden">
                                               </tr>
                                              <tr>
                                                 <td>Email</td>
                                                 <td>:</td>
                                                 <td><?php echo $e?></td>
						<input name="e" value = "<?php echo $e?>" type="hidden">
                                               </tr>
                                              <tr>
                                                 <td>Phone number</td>
                                                 <td>:</td>
                                                 <td><?php echo $pnum?></td>
						<input name="pnum" value = "<?php echo $pnum?>" type="hidden">
                                               </tr>
                                              <tr>
                                                 <td>Institute</td>
                                                 <td>:</td>
                                                 <td><?php echo $i?></td>
						<input name="i" value = "<?php echo $i?>" type="hidden">
                                               </tr>
                                              <tr>
                                                 <td>Number of members</td>
                                                 <td>:</td>
                                                 <td><?php echo $tnum?></td>
						<input name="tnum" value = "<?php echo $tnum?>" type="hidden">
                                               </tr>
                                                <tr>
                                                 <td>Accomodation required</td>
                                                 <td>:</td>
						<input name="accomodation" value = "<?php echo $accomodation ?>" type="hidden">
                                                 <td><?php echo $accomodation?></td>
                                               </tr>
                                               <tr>
                                                 <td>Amount</td>
                                                 <td>:</td>
                                                 <td><?php echo $to_pay?></td>
						<input name="to_pay" value = "<?php echo $to_pay?>" type="hidden">
                                               </tr>
                                                 </table></font>
                                       <!--button class="btn waves-effect waves-light tooltipped" type="submit" name="action" data-position="top" data-delay="700" data-tooltip="Click here to Proceed">OK</button></form>
                                       <input type='submit' value='Payment' name='livemethodname'/></div--></form>
              <strong><font color="red"><p>NOTE :</p>
                                   <ul><li>*All transactions in favour of VARCHAS'15 are non refundable and non transferable.</li>
                                       <li>*Save the receipt that you will get after the online payment and note the transaction id.</li>
                                   </ul></font></strong>



				<button class="btn waves-effect waves-light tooltipped" type="submit" value='Payment' name='livemethodname'/ data-position="top" data-delay="700" data-tooltip="Click here to Pay">Pay</button>
			</div>
		</div>
	</div>
        <?php
					
				}
				
				else if($sql_error)
					echo mysql_error();
				else
					echo "";
				$allFieldEmpty=$sql_error=$check=false;
				?>
		
	<script src="js/default.js"></script>
	<script src = "js/jquery-2.1.1.min.js"></script>
	<script src = "js/materialize.js"></script>
</form>	
</body>
</html>
