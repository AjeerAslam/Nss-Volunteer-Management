<?php
session_start();
include ("connect.php");
if(isset($_POST["LOG"]))
{
	$id = $_POST["ENo"];
	$dob = $_POST["VolDob"];
	$query = "select * from volunteer where ENo=$id AND VolDob='$dob' ";
	$results = mysqli_query($con,$query);
	$count = mysqli_num_rows($results);
	if($count == 1)
	{
		$_SESSION['ENo']=$id;
		header('Location: volhome.php');
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
<title>Login form</title>
<body>
	<a align="right" href="index.html">back to home</a>
<center>
<b><h2>VOLUNTEER LOGIN</h2></b>
<form action=" " name="f1" method="post"/>
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h3>Enrolment No:</h3></td> <td><input type="text" name="ENo" placeholder="Your Eno" size=20/></td>
</tr>
<tr>
<td align="left"><h3>Date Of Birth :</h3></td> <td><input type="text" name="VolDob" placeholder="yyyy-mm-dd" size=20/></td>
</tr>
</table>
<input type=submit name="LOG" value="LOG IN" > <input type=reset value="RESET"/>
</pre>
</center>
</body>
</html>
