<?php
include("connect.php");
if(isset($_POST["sec_submit"])){
	$sec_batch=$_POST['sec_batch'];
	$sec_enrollment_no=$_POST['sec_enrollment_no'];
	$sec_username=$_POST['sec_username'];
	$sec_password=$_POST['sec_password'];
	$query="insert into volunteer_secretary(sec_batch,sec_enrollment_no,sec_username,sec_password)values('$sec_batch','$sec_enrollment_no','$sec_username','$sec_password')";
	$results = mysqli_query($con,$query);


}
?>

}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form action='addsecretary.php' method='post'><br>
<label> sec_batch </label>
<input type='text' name='sec_batch' required><br>
<label> sec_enrollmentno </label>
<input type='text' name='sec_enrollment_no' required><br>
<label> sec_username </label>
<input type='text' name='sec_username' required><br>
<label> sec_password </label>
<input type='text' name='sec_password' required><br>
<input type='submit' name='sec_submit' value='submit'>
</form>

</body>
</html>