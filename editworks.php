<?PHP
session_start();
include("connect.php");
$WorkId=$_SESSION['WorkId'];
if(isset($_POST['Update'])) {
	$WorkDetails=$_POST['WorkDetails'];
	$WorkDate=$_POST['WorkDate'];
	$query="UPDATE work SET WorkDetails='$WorkDetails',WorkDate='$WorkDate' WHERE WorkId='$WorkId'";
	$results = mysqli_query($con,$query);
	if(!$results){
		echo "An error occur" ;
	}else{
		echo "updated";
		header('Location: showworks.php');
	}
}
$query1="SELECT WorkDetails,WorkDate FROM work WHERE WorkId='$WorkId'";
$results1=mysqli_query($con,$query1);
if(!$results1){
		echo "invalid work id" ;
	}else{
		$row=mysqli_fetch_assoc($results1);
		$WorkDetails=$row['WorkDetails'];
		$WorkDate=$row['WorkDate'];
	}
echo<<<EOL
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>editwork</title>
</head>
<body bgcolor="#87CEFA">
<center>
<b><font face="arial" color="red">WORK REGISTRATION</font></b>

<form action="editworks.php" name=WorkRegistrationForm method='post'>
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h2>Work ID:</h2></td> 
<td><input type="text" name='WorkId' value=$WorkId size=20 readonly="readonly" required></td>
<tr>
<td align="left"><h2>Work Details:</h2></td> 
<td><input type="text" name='WorkDetails' value=$WorkDetails size=100 required></td>
</tr>
<tr>
<td align="left"><h2>Date:</h2></td> 
<td><input type="text" name='WorkDate' value=$WorkDate size=20 required></td>
</tr>
</table>
<input type=submit value="UPDATE"  name="Update">
</pre>
</form>
</center>
</body>
</html>
EOL;
?>