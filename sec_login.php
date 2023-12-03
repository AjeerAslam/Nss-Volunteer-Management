<?php
session_start();
include ("connect.php");
if(isset($_POST["LOG"]))
{
	$id = $_POST["SecVolId"];
	$p = $_POST["SecPassword"];
	$query = "select * from secretary where SecVolId =$id and SecPassword =$p";
	$results = mysqli_query($con,$query);
	$count = mysqli_num_rows($results);
	echo $count;
	if($count == 1)
	{
		$_SESSION['SecVolId']=$id;
		echo<<<EOL
		<script language="javascript">
		window.alert("SUCCESSFULLY LOGED IN");
		</script>
		EOL;
		header('Location: sec_home.html');
	}
	else
	{
		echo<<<EOL
		<script language="javascript">
		window.alert("Invalid Details");
		</script>
		EOL;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'> </link>
</head>
<body>
	<a align="right" href="index.html">back to home</a>
<form action=" "method='post'>
<center>
<pre>
<b><h2>SECRETARY LOGIN<h2></b>

<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h3><pre>SECRETARY ID *:</h2></td> <td><input type="text" name="SecVolId" id=t1 placeholder="Volunteer Id" size=30/></td>
</tr>
<tr>
<td align="left"><h3>PASSWORD *:</h2></td> <td><input type="password" name="SecPassword" id=t2 placeholder="Enter the Password" size=30/></td>
</tr>
</table>

<center><input type="submit" name="LOG" value="LOG IN"/>&nbsp;&nbsp;<input type="reset" value="RESET"/></center>
</form>
</pre>
</center>
</body>
</html>