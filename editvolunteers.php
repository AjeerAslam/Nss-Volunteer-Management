<?PHP
session_start();
include("connect.php");
$ENo=$_SESSION['ENo'];
if(isset($_POST['Update'])) {
$VolName=$_POST['VolName'];
$VolEmail=$_POST['VolEmail'];
$VolBg=$_POST['VolBg'];
$VolBatch=$_POST['VolBatch'];
$VolDob=$_POST['VolDob'];
$VolDepartment=$_POST['VolDepartment'];
$VolYear=$_POST['VolYear'];
$VolSex=$_POST['VolSex'];
	$query="UPDATE volunteer SET VolName='$VolName',VolEmail='$VolEmail',VolBg='$VolBg',VolBatch='$VolBatch',VolDob='$VolDob',VolDepartment='$VolDepartment',VolYear='$VolYear',VolSex='$VolSex' WHERE ENo='$ENo'";
	$results = mysqli_query($con,$query);
	if(!$results){
		echo "An error occur" ;
	}else{
		echo "updated";
		header('Location: showvolunteer.php');
	}
}
$query1="SELECT VolName,VolEmail,VolBg,VolBatch,VolDob,VolDepartment,VolYear,VolSex FROM volunteer WHERE ENo='$ENo'";
$results1=mysqli_query($con,$query1);
if(!$results1){
		echo "invalid vol id" ;
	}else{
$row=mysqli_fetch_assoc($results1);
$VolName=$row['VolName'];
$VolEmail=$row['VolEmail'];
$VolBg=$row['VolBg'];
$VolBatch=$row['VolBatch'];
$VolDob=$row['VolDob'];
$VolDepartment=$row['VolDepartment'];
$VolYear=$row['VolYear'];
$VolSex=$row['VolSex'];
	}
echo<<<EOL
<!DOCTYPE html>
<html>
<head>
<title>Officer Registration</title>
</head>

<body>
<center>
<b><h2>VOLUNTEER REGISTRATION</h2></b>
<form name="registration" method="post" action=" " >
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="left"><h3>ENo:</h3></td>
<td><input type="text"   value="$ENo" size=50 readonly="readonly"></td>
</tr>
<tr>
<td align="left"><h3>NAME:</h3></td>
<td><input type="text"  name="VolName" value="$VolName" size=50></td>
</tr>
<tr>
<td align="left"><h3>DEPARTMENT:</h3></td>
<td><input type="radio"  name="VolDepartment" value="IT">IT <input type="radio" name="VolDepartment" value="CS">CS <input type="radio" name="VolDepartment" value="ME">ME <input type="radio" name="VolDepartment" value="CIIVIL">CIVIL <input type="radio" name="VolDepartment" value="EEE">EEE <input type="radio" name="VolDepartment" value="EC">EC</td>
</tr>
<tr>
<td align="left"><h3>EMAIL ID:</h3></td>
<td><input type="text"  name="VolEmail" value=$VolEmail size=50></td>
</tr>
<tr>
<td align="left"><h3>DOB:</h3></td>
<td><input type="date"  name="VolDob" value=$VolDob size=50></td>
</tr>
<tr>
<td align="left"><h3>BLOOD GROUP:</h3></td>
<td><input type="text" name="VolBg"  value=$VolBg size=50></td>
</tr>
<tr>
<td align="left"><h3>YEAR:</h3></td>
<td><input type="radio"  name="VolYear" value="firstyear">first year <input type="radio" name="VolYear" value="second year">second year</td>
</tr>
<tr>
<td align="left"><h3>SEX:</h3></td>
<td><input type="radio"  name="VolSEX" value="female">female <input type="radio" name="VolSEX" value="male">male<input type="radio" name="VolSEX" value="others">others</td>
</tr>
<tr>
<td align="left"><h3>BATCH:</h3></td>
<td><input type="text" name="VolBatch" value=$VolBatch size=50></td>
</tr>
</table>
<input type=submit name="Update" value="UPDATE"/> <input type=reset value="RESET"/>
</pre>
</form>
</center>
</body>
</html>
EOL;
?>