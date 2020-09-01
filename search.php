<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "username";
$password = "password";
$db = "dbname";

$Res = $_REQUEST['Res'];
$Reg = $_REQUEST['Reg'];
$Rich = $_REQUEST['Rich'];

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from eveplanets 
        where (Resource like '%$Res%' AND Region like '%$Reg%' AND Richness like '%$Rich%')
        order by Region";

$result = $conn->query($sql);
echo "<table>
        <tr>
            <td width='100'><b><u>Region</b></u></td>
            <td width='100'><b><u>System</b></u></td>
            <td width='100'><b><u>Planet</b></u></td>
            <td width='150'><b><u>Resource</b></u></td>
            <td width='100'><b><u>Richness</b></u></td>
        </tr>";
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo "<TR><TD>";
	echo $row["Region"];
	echo "</TD><TD>";
	echo $row["System"];
	echo "</TD><TD>";
	echo $row["Planet Name"];
	echo "</TD><TD>";
	echo $row["Resource"];
	echo "</TD><TD>";
	echo $row["Richness"];
	echo "</TD></TR>";
}
} else {
	echo "0 records";
}
echo "</table>";
$conn->close();

?>