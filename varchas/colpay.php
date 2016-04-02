<?php
$secret_key="f59ycg3iwb384cxrxd0mtwktrjybke29gieed0z10egeqaorey"; 
$api_key="mu7tbx3jiwt2csorlzp6afssimb1emi60n0khyv3xtuik9sdpv";   
$api_url="http://thecollegefever.com/tcfwebapi/api/thecollegefever_api_payment.php"; 
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
	"task"=>"total_payment",    
	"client_id"=>"6Uyfpq",                      
    "user_name"=>"Makarand Gomashe",                          
    // User name                       
    "user_uid"=>"TCF96",                           
    // User Unique ID Number                      
    "event_name"=>"VARCHAS15",                         
    // Event Name
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
$arrayResponse=json_decode($response);
$responseStatus=$arrayResponse->response;
$statusResult=$responseStatus->result;
if($statusResult !='error')
{
	echo $arrayResponse->paidAmount;
	echo $arrayResponse->eventList;
}
else
{
	echo $responseStatus->response_msg;
}
		
?>
