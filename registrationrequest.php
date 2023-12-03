<?php
session_start();
include('connect.php');
if(isset($_POST['AcceptVolunteer'])){
	$ENo=$_POST['ENo'];
	$query3="UPDATE volunteer SET VolStatus='Accepted' WHERE ENo='$ENo'";
	$results3=mysqli_query($con,$query3);
	if(!$results3){
		echo "An error occur";
	}else{
		echo "Accepted";
	}
	$query11="select max(ENo) from volunteer";
	$results11  = mysqli_query($con,$query11);
	if(!$results11){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}
	else{
		$row=mysqli_fetch_assoc($results11);
		$ENo=$row['max(ENo)'];
		echo<<<EOL
		<script>
			window.alert("volunteer ENo : "+$ENo);
		</script>
		EOL;
	}
}
if(isset($_POST['DeleteVolunteer'])){
	$ENo=$_POST['ENo'];
	$query2="DELETE FROM volunteer WHERE ENo='$ENo'";
	$results2=mysqli_query($con,$query2);
	if(!$results2){
		echo "An error occur";
	}else{
		echo "Deleted";
	}
}
$query="SELECT ENo,VolName FROM volunteer WHERE VolStatus='Requested'";
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
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
EOL;
echo<<<EOL
<tr>
<td align="center"><h2>EnrollmentNo</h2></td>
<td align="center"><h2>VolunteerName</h2></td>

 
</tr>
EOL;
while($row=mysqli_fetch_assoc($results)){
$ENo=$row['ENo'];
$VolName=$row['VolName'];
echo<<<EOL
<tr>
<form action="registrationrequest.php" name=WorkRegistrationForm method='post'>
<td align="center"><h3><input type="text" name="ENo" value=$ENo readonly="readonly"></h3></td>
<td align="center"><h3>$VolName</h3></td>
<td align="center"><h3><input type="submit" name="DeleteVolunteer" value="DELETE"></h3></td>
<td align="center"><h3><input type="submit" name="AcceptVolunteer" value="ACCEPT"></h3></td>
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