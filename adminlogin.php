<?php
include("connect.php");
if(isset($_POST["LOG"]))
{
$id = $_POST['t1'];
$p = $_POST['t2'];
$query = "select * from admin where AdminId=$id and AdminPassword=$p";
$results = mysqli_query($con,$query);
$count = mysqli_num_rows($results);
echo $count;
echo $count;
if($count == 1)
{
$_SESSION['AdminId']=$id;
header('Location: adminhome.html');
}
else
{
echo<<<EOL
<script language="javascript">
window.alert("INVALID DETAILS");
</script>;
EOL;
//echo $count;
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

<b><font face="arial" color="black">ADMIN LOG IN</font></b>

<form action=" " name="f1" method='post' onsubmit="myFunction()">

<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h2>ADMIN Id:</h2></td> <td><input type="text" name="t1" id=t1 placeholder="Volunteer Id" size=20/></td>
</tr>
<tr>
<td align="left"><h2>PASSWORD:</h2></td> <td><input type="password" name="t2" id=t2 placeholder="Enter the Password" size=20/></td>
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