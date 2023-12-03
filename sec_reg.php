<?PHP
include("connect.php");
if(isset($_POST['REGISTER'])) {
	$Sec_id=$_POST['SecVolId'];
	$Sec_pass=$_POST['SecPassword'];
	$query1="select * from volunteer where ENo=$Sec_id";
	$results1= mysqli_query($con,$query1);
	$count= mysqli_num_rows($results1);
	if($count == 0)
	{
		echo<<<EOL
			<script language="javascript">
			window.alert("Volunteer not exists in list");
			</script>
			EOL;
	}
	else
	{
		$query="INSERT INTO secretary(SecVolId,SecPassword)VALUES('$Sec_id','$Sec_pass')";
		$results = mysqli_query($con,$query);
		if(!$results){
			echo<<<EOL
			<script language="javascript">
			window.alert("Something went wrong,try again");
			</script>
			EOL;
		}
		else
		{
			echo<<<EOL
			<script language="javascript">
			window.alert("Registraton successfully completed!");
			</script>
			EOL;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<script language="javascript">
</script>
<title>secretary reg</title>
</head>
<body>
<center>
<b><font face="arial" color="black">SECRETARY REGISTRATION</font></b>

<form action=" " name="f2" method='post'>
<pre>
<table border="3px" name=table2 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h2>Secretary Volunteer Id:</h2></td> <td><input type="text" name="SecVolId" id=t2 placeholder="Enter the secretary id" size=30/></td>
</tr>
<tr>
<td align="left"><h2>Password:</h2></td> <td><input type="password" name="SecPassword" id=t3 placeholder="Must contain 8 characters" size=30/></td>
</tr>
<tr>
<td align="left"><h2>Confirm password:</h2></td> <td><input type="password" id=t4 placeholder="rewrite the password" size=30/></td>
</tr>
</table>
<input type="submit" name="REGISTER" value="REGISTER" />	<input type="reset" value="RESET"/>
</form>
</pre>
</center>
</body>
</html>