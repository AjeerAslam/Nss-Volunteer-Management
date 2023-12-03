<?PHP
session_start();
include("connect.php");
$ENo=$_SESSION['ENo'];
if(isset($_POST['Search'])){
	$Key=$_POST['Key'];
$query="SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkId like '%$Key%' OR WorkDetails like '%$Key%' AND WorkStatus='NotFinished' ORDER BY WorkDate";
}else{
$query='SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkStatus="NotFinished" ORDER BY WorkDate';
}
$query2='SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkStatus="Finished" ORDER BY WorkDate';



$results=mysqli_query($con,$query);
$results2=mysqli_query($con,$query2);


$query3="select VolAttendPerc,VolName from volunteer where ENo=$ENo";
	$results3  = mysqli_query($con,$query3);
	if(!$results3){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}
	else{
		$row=mysqli_fetch_assoc($results3);
		$VolAttendPerc=$row['VolAttendPerc'];
		$VolName=$row['VolName'];

	
	}



echo<<<EOL
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>showworks</title>
</head>
<body bgcolor="#87CEFA">
<a align="right" href="index.html">back to home</a>
<center>
<b><font face="arial" color="black">WELCOME Mr/Ms $VolName</font></b><br><br><br>
<table  name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="center"><h2>Enrollment No:</h2></td>
<td align="center"><h2>$ENo</h2></td>
</tr>
<tr>
<td align="center"><h2>Your Attendence:</h2></td>
<td align="center"><h2>$VolAttendPerc%</h2></td>
</tr>
</table><br>


<br>
<b><font face="arial" color="red">UPCOMING WORKS</font></b>
<pre>
<form action="volhome.php" name=WorkRegistrationForm method='post'>
<input type="search" name="Key" placeholder="enter WorkId or WorkName" required>
<input type="submit" name="Search" value="SEARCH" >
</form>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
EOL;
echo<<<EOL
<tr>
<td align="center"><h2>WorkId</h2></td>
<td align="center"><h2>WorkDetails</h2></td>
<td align="center"><h2>WorkDate</h2></td>
<td align="center"><h2>WorkStatus</h2></td>

 
</tr>
EOL;
while($row=mysqli_fetch_assoc($results)){
$WorkId=$row['WorkId'];
$WorkDetails=$row['WorkDetails'];
$WorkDate=$row['WorkDate'];
$WorkStatus=$row['WorkStatus'];

echo<<<EOL
<tr>
<td align="center"><h3><input type="text" name="WorkId" value=$WorkId readonly="readonly"></h3></td>
<td align="center"><h3>$WorkDetails</h3></td>
<td align="center"><h3>$WorkDate</h3></td>
<td align="center"><h3>$WorkStatus</h3></td>

 
</tr>
EOL;
}
echo<<<EOL
</table>
</pre>
<b><font face="arial" color="red">FINISHED WORKS</font></b>

<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
EOL;
echo<<<EOL
<tr>
<td align="center"><h2>WorkId</h2></td>
<td align="center"><h2>WorkDetails</h2></td>
<td align="center"><h2>WorkDate</h2></td>
<td align="center"><h2>WorkStatus</h2></td> 
<td align="center"><h2>Attendence</h2></td>
</tr>
EOL;
while($row=mysqli_fetch_assoc($results2)){
$WorkId=$row['WorkId'];
$WorkDetails=$row['WorkDetails'];
$WorkDate=$row['WorkDate'];
$WorkStatus=$row['WorkStatus'];
$query4="select Attendence from attends where ENo=$ENo AND WorkId=$WorkId";
	$results4  = mysqli_query($con,$query4);
	if(!$results3){
		echo "SORRY SOMETHING WENT WRONG,TRY AGAIN..." ;
	}
	else{
		$row=mysqli_fetch_assoc($results4);
		$Attendence="null";
		if(isset($row['Attendence'])){
		$Attendence=$row['Attendence'];
	}
	}
echo<<<EOL
<tr>
<td align="center"><h3>$WorkId</h3></td>
<td align="center"><h3>$WorkDetails</h3></td>
<td align="center"><h3>$WorkDate</h3></td>
<td align="center"><h3>$WorkStatus</h3></td>
EOL;
if ($Attendence=="Present"){
echo<<<EOL
<td align="center"><h3>$Attendence</h3></td> n v
EOL;
}else{
echo<<<EOL
<td align="center"><h3><font face="arial" color="red">$Attendence</font></h3></td> 
EOL;

}

echo"</tr>";
}
echo<<<EOL
</table>
</pre>
</center>
</body>
</html>
EOL;
?>