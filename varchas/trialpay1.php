<form action='' method='POST'>
<input type='submit' value='Payment' name='livemethodname'/>
</form>
<?php
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
	        "user_name"=>$fname,                          
	        // User name                       
		    "user_uid"=>$varID,                           
		    // User Unique ID Number                      
		    "user_email"=>$e,                         
		    // User Email Address (to get Ticket)
		    "user_contact_number"=>$pnum,                
		    // User Contact Number
		    "user_gender"=>"from_sports",                        
		    // User Gender              
		    "user_college_name"=>$i,                  
		    // User Collge Name              
		    "user_pursuing_year"=>"UnderGraduate",                 
		    // User Pursuing Year
		    "user_address"=>$city,                       
		    // User Address
		    "user_event_registered"=>$sname,              
		    // User registered event(Example :General Fees,Accomodation)
		    "user_event_charge"=>$acc*$tnum,                  
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
		    "event_admin_email"=>"mgomashe@gmail.com",                  
		    // Event admin email (to get user notification Ticket)        
		    "event_name"=>"VARCHAS15",                         
		    // Event Name
		    "event_college_name"=>"IIT Jodhpur",                 
		    // Event College Name
		    "event_address"=>"IIT Jodhpur, Jodhpur(Raj.)",                      
		    // Event Address    
                   "event_date"=>"2015-10-29",                      
		    // Set Event Date
                   "orgnaniser_details"=>"Orgnaniser details",                      
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
		
