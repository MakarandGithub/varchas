<?php
$connection = mysql_connect('172.16.100.4', 'ignus', 'ignus9876'); 
mysql_select_db('ignus');

$query = "SELECT * FROM v15"; //You don't need a ; like you do in SQL
$result = mysql_query($query);




echo "<table>"; // start a table tag in the HTML

echo
"<tr>
    <th>ID</th>
    <th>Sport</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone number</th>
    <th>Institute</th>
    <th>city</th>
    <th>team</th>
    <th>Varchas ID</th>
    <th>Accomodation</th>
</tr>";

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
/*if($row['sport']=='Cricket'){$color = '#EBBF2E';}
else if($row['sport']=='Athletics'){$color = '#EB412E';}
else if($row['sport']=='BasketBall(men)'){$color = '#EB8D2E';}
else if($row['sport']=='VolleyBall(men)'){$color = '#98B513';}
else if($row['sport']=='BasketBall'){$color = '#EB8D2E';}
else if($row['sport']=='VolleyBall'){$color = '#98B513';}
else if($row['sport']=='Chess'){$color = '#48703A';}
else if($row['sport']=='Tennis'){$color = '#25A860';}
else if($row['sport']=='TableTennis(men)'){$color = '#25A899';}
else if($row['sport']=='TableTennis'){$color = '#25A899';}
else if($row['sport']=='Online'){$color = '#2566A8';}
else if($row['sport']=='WeightLifting'){$color = '#2E25A8';}
else if($row['sport']=='Squash'){$color = '#7325A8';}
else if($row['sport']=='FootBall'){$color = '#CC45D8';}
else if($row['sport']=='Badminton(men)'){$color = '#E81946';}
else if($row['sport']=='Badminton'){$color = '#E81946';}
else if($row['sport']=='BasketBall(women)'){$color = '#B2BC79';}
else if($row['sport']=='VolleyBall(women)'){$color = '#79BC95';}
else if($row['sport']=='TableTennis(women)'){$color = '#9479BC';}
else if($row['sport']=='Badminton(women)'){$color = '#BC7988';}*/

echo "<tr style='background-color:".$color."'><td>" . $row['id'] . "</td><td>" . $row['sport'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phonenumber'] . "</td><td>" . $row['institute'] . "</td><td>" . $row['city'] . "</td><td>" . $row['team'] . "</td><td>" . $row['vID'] . "</td><td>" . $row['accomodation'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close();


?>
