<?php
	require 'connect.php';
	//require '../collageList.php';
	//require '../gen_funct.php';

	$query = "SELECT * FROM v15";
	$result = mysqli_query($connect, $query); 

	$data = array();	
	while($participant = $result->fetch_array(MYSQLI_ASSOC)){
		// pr($participant);
		$data[$participant['id']]['id'] = $participant['id'];
		$data[$participant['id']]['sport'] = $participant['sport'];
		$data[$participant['id']]['first_name'] = $participant['first_name'];
		$data[$participant['id']]['last_name'] = $participant['last_name'];
		$data[$participant['id']]['email'] = $participant['email'];
		$data[$participant['id']]['phonenumber'] = $participant['phonenumber'];
		$data[$participant['id']]['institute'] = $participant['institute'];
		$data[$participant['id']]['city'] = $participant['city'];
		$data[$participant['id']]['team'] = $participant['team'];
		
	}
?>
