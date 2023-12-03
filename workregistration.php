<?PHP
include("connect.php");
if(isset($_POST['AddWork'])) {
	$WorkDetails=$_POST['WorkDetails'];
	$WorkDate=$_POST['WorkDate'];
	$query="INSERT INTO work(WorkDetails,WorkDate,WorkStatus,WorkOfficerId)VALUES('$WorkDetails','$WorkDate','NotFinished',200000)";
	$results = mysqli_query($con,$query);
	if(!$results){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}else{
echo<<<EOL
<script language="javascript">
window.alert("Inserted successfully");
</script>;
EOL;



	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>workregistration</title>
</head>
<body>
<center>
<b><h2>WORK REGISTRATION</h2></b>
<form action=" " name=WorkRegistrationForm method='post' >
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h3>WORK DETAILS:</h3></td> 
<td><input type="text" name='WorkDetails' placeholder="Blood donation camp at mannampatta" size=100 required></td>
</tr>
<tr>
<td align="left"><h3>DATE:</h3></td> 
<td><input type="text" name='WorkDate' placeholder="2017-06-01" size=20 required></td>
</tr>
</table>
<input type=submit value="ADD WORK"  name="AddWork"> <input type=reset value="RESET"/>
</pre>
</form>
</center>
</body>
</html>