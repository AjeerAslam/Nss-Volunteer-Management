<?php
session_start();
include('connect.php');
if(isset($_POST['Search'])){
	$Key=$_POST['Key'];
$query="SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkId like '%$Key%' OR WorkDetails like '%$Key%' AND WorkStatus='NotFinished' ORDER BY WorkDate";
}else{
$query='SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkStatus="NotFinished" ORDER BY WorkDate';
}
$query2='SELECT WorkId,WorkDetails,WorkDate,WorkStatus FROM Work WHERE WorkStatus="Finished" ORDER BY WorkDate';



$results=mysqli_query($con,$query);
$results2=mysqli_query($con,$query2);
echo<<<EOL
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>showworks</title>
</head>
<body bgcolor="#87CEFA">
<center>
<b><font face="arial" color="red">UPCOMING WORKS</font></b>
<pre>
<form action="showworks.php" name=WorkRegistrationForm method='post'>
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
<form action="showworks.php" name=WorkRegistrationForm method='post'>
<td align="center"><h3><input type="text" name="WorkId" value=$WorkId readonly="readonly"></h3></td>
<td align="center"><h3>$WorkDetails</h3></td>
<td align="center"><h3>$WorkDate</h3></td>
<td align="center"><h3>$WorkStatus</h3></td>
</form>
 
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
</tr>
EOL;
while($row=mysqli_fetch_assoc($results2)){
$WorkId=$row['WorkId'];
$WorkDetails=$row['WorkDetails'];
$WorkDate=$row['WorkDate'];
$WorkStatus=$row['WorkStatus'];
echo<<<EOL
<tr>
<td align="center"><h3>$WorkId</h3></td>
<td align="center"><h3>$WorkDetails</h3></td>
<td align="center"><h3>$WorkDate</h3></td>
<td align="center"><h3>$WorkStatus</h3></td>
</tr>
EOL;
}
echo<<<EOL
</table>
</pre>
</center>
</body>
</html>
EOL;
?>
