<?PHP
include("connect.php");
if(isset($_POST['Submit'])) {
	$OfficerName=$_POST['OfficerName'];
	$OfficerDepartment=$_POST['OfficerDepartment'];
	$OfficerEmail=$_POST['OfficerEmail'];
	$OfficerBatch=$_POST['OfficerBatch'];
	//$OfficerId=$_POST['OfficerId'];
	$OfficerPassword=$_POST['OfficerPassword'];
	$query="INSERT INTO officer(OfficerName,OfficerDepartment,OfficerEmail,OfficerBatch,OfficerPassword,AdminId)VALUES('$OfficerName','$OfficerDepartment','$OfficerEmail','$OfficerBatch','$OfficerPassword',999)";
	$results = mysqli_query($con,$query);
	if(!$results){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}else{
		echo<<<EOL
		<script>
			window.alert("Registration successfully completed!");
		</script>
		EOL;
	}
	$query1="select max(OfficerId) from officer";
	$results1  = mysqli_query($con,$query1);
	if(!$results1){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}
	else{
		$row=mysqli_fetch_assoc($results1);
		$OfficerId=$row['max(OfficerId)'];
		echo<<<EOL
		<script>
			window.alert("Officer id : "+$OfficerId);
		</script>
		EOL;
	}
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Officer Registration</title>
 </head>

<body>
<center>
<b><h2>OFFICER REGISTRATION</h2></b>
<form name="registration" method="post" action="officerregister.php">
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h3>OFFICER NAME:</h3></td>
<td><input type="text"  id="oname" name="OfficerName" placeholder="name" size=50></td>
</tr>
<tr>
<td align="left"><h3>DEPARTMENT:</h3></td>
<td><input type="radio"  name='OfficerDepartment' value="IT">IT <input type="radio" name="OfficerDepartment" value="CS">CS <input type="radio" name="OfficerDepartment" value="ME">ME <input type="radio" name="OfficerDepartment" value="CIIVIL">CIVIL <input type="radio" name="OfficerDepartment" value="EEE">EEE <input type="radio" name="OfficerDepartment" value="EC">EC</td>
</tr>
<tr>
<td align="left"><h3>EMAIL ID:</h3></td>
<td><input type="email"  id="email" name="OfficerEmail" placeholder="eg:abc@gmail.com" size=50></td>
</tr>
<tr>
<td align="left"><h3>BATCH:</h3></td>
<td><input type="text" id="batch" name="OfficerBatch" placeholder="Batch" size=50></td>
</tr>
<tr>
<td align="left"><h3>PASSWORD:</h3></td>
<td><input type="password"  id="password" name="OfficerPassword" placeholder="must cointain 8 characters" size=50></td>
</tr>
<tr>
<td align="left"><h3>CONFIRM PASSWORD:</h3></td>
<td><input type="password"  id="cpassword" placeholder="same as the above" size=50></td>
</tr>
<tr>
<td></td>
<td align="center">	
<input type=submit name="Submit" value="REGISTER"/> <input type=reset value="RESET"/></td>
</tr>
</table>
</pre>
</form>
</center>

</body>
</html>