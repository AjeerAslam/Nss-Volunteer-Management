<?php
session_start();
include('connect.php');
 


if(isset($_POST['Search'])){
	$Key=$_POST['Key'];
$query="SELECT ENo,VolName,VolAttendPerc FROM volunteer WHERE VolStatus='Accepted' AND ENo like '%$Key%' OR VolName like '%$Key%' ORDER BY VolName";
}else{
$query="SELECT ENo,VolName,VolAttendPerc FROM volunteer WHERE VolStatus='Accepted'";
}
$results=mysqli_query($con,$query);
echo<<<EOL
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>showworks</title>
</head>
<body bgcolor="#87CEFA">
<center>
<b><font face="arial" color="red">VOLUNTEER TABLE</font></b>
<pre>
<form action="showvolunteer.php" name=WorkRegistrationForm method='post'>
<input type="search" name="Key" placeholder="enter ENo or VolName">
<input type="submit" name="Search" value="SEARCH">
</form>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
EOL;
echo<<<EOL
<tr>
<td align="center"><h2>EnrollmentNo</h2></td>
<td align="center"><h2>VolunteerName</h2></td>
<td align="center"><h2>Attendence</h2></td>

 
</tr>
EOL;
while($row=mysqli_fetch_assoc($results))
{
	$ENo=$row['ENo'];
	$VolName=$row['VolName'];
	$VolAttendPerc=$row['VolAttendPerc'];
	echo<<<EOL
	<tr>
		<form action="showvolunteer.php" name=WorkRegistrationForm method='post'>
		<td align="center"><h3><input type="text" name="ENo" value=$ENo readonly="readonly"></h3></td>
		<td align="center"><h3>$VolName</h3></td>
		<td align="center"><h3>$VolAttendPerc</h3></td>
		</form>
	</tr>
	EOL;
}
echo<<<EOL
</table>
</pre>
</center>
</body>
</html>
EOL;
?>