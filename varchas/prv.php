<?php
	
	require 'prc.php';


?>
<html>
<head>
	<title>Varchas | PR</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-1.9.1_home.js"></script>
</head>
<body>
	<!--a href='logout.php' style="float:right; margin:10px;"><button class="btn btn-danger">Logout</button></a-->
	<div style="padding:10px;">
		<h1>Pr Table</h1>
		<table class="table table-bordered">
			<tr>
				<th>S. No.</th>
				<th>sport</th>
				<th>first name</th>
				<th>last name</th>
                                <th>Email Id</th>
				<th>Contact Number</th>
				<th>institute</th>
				<th>city</th>
				<th>no of players in team</th>
			</tr>
			<?php
				$sno = 0;
				foreach ($data as $key => $participant) {
					
					
					echo "<tr style='background-color: red'>";
					echo "<td>".(++$sno)."</td>";
					echo "<td>".$participant['sport']."</td>";
					echo "<td>".$participant['first_name']."</td>";
                                        echo "<td>".$participant['last_name']."</td>";
					echo "<td>".$participant['email']."</td>";
					echo "<td>".$participant['phonenumber']."</td>";
					echo "<td>".$participant['institute']."</td>";
					echo "<td>".$participant['city']."</td>";
					echo "<td>".$participant['team']."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>	
</body>
</html>
