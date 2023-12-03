<?php
include("connect.php");
if(isset($_POST["LOG"]))
{
$id = $_POST['t1'];
$p = $_POST['t2'];
$query = "select * from Officer where OfficerId=$id and OfficerPassword=$p";
$results = mysqli_query($con,$query);
$count = mysqli_num_rows($results);
if($count==1)
{
	$_SESSION['OfficerId']=$id;
	header('Location: officer.html');
}
else
{
	$err_m = 'invalid details';
	echo<<<EOL
	<script language="javascript">
	window.alert("INVALID DETAILS") ;
	</script>;
	EOL;  
}
}
echo<<<EOL
<!DOCTYPE html>
<html>
<head>


<title>Reg form</title>
</head>
<body bgcolor="white">
<a align="right" href="index.html">back to home</a>
<center>
<pre>

<b><font face="arial" color="black">OFFICER LOG IN</font></b>

<form action=" " name="f1" method='post' onsubmit="myFunction()">

<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h2>OFFICER ID *:</h2></td> <td><input type="text" name="t1" id=t1 placeholder="Officer Id" size=20/></td>
</tr>
<tr>
<td align="left"><h2>PASSWORD *</h2></td> <td><input type="password" name="t2" id=t2 placeholder="Enter the Password" size=20/></td>
</tr>
</table>
<input type="submit" name="LOG" value="LOG IN"/> <input type="reset" value="RESET"/>
</form>
</pre>
</center>
</body>
</html>
EOL;
?>