<?php
session_start();
include('connect.php');
if(isset($_POST['PRINT']))
{
function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
 
$fileName = "volunteers-data_" . date('Y-m-d') . ".xls";
 

$fields = array('ENo', 'FIRST NAME', 'DEPARTMENT', 'YERA', 'BATCH','GENDER','DOB', 'BLOOD');
 
$excelData = implode("\t", array_values($fields)) . "\n";
 
$query = "SELECT * FROM volunteer ORDER BY ENo ASC";
$result= mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count == 1){  
    while($row = mysqli_fetch_assoc($result)){
        $lineData = array($row['ENo'], $row['VolName'], $row['VolDepartment'], $row['VolYear'], $row['VolBatch'], $row['VolSex'], $row['VolDob'], $row['VolBg']);
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
   
    }
    else
    {
    $excelData .= 'No records found...'. "\n";
}
  header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");
  echo $excelData;
}

$query="SELECT * FROM volunteer WHERE VolStatus='Accepted'";

$results=mysqli_query($con,$query);
echo<<<EOL
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>showvol</title>
</head>
<body>
<center>
<b><font face="times new roman" color="red">VOLUNTEER TABLE</font></b>
<pre>
<table border="3px" name=table1 align="center" cellspacing="4px" cellpadding="3px">
<tr>
<td align="center"><h2>ENo</h2></td>
<td align="center"><h2>Name</h2></td>
<td align="center"><h2>Department</h2></td>
<td align="center"><h2>Year</h2></td>
<td align="center"><h2>Batch</h2></td>
<td align="center"><h2>Gender</h2></td>
<td align="center"><h2>DOB</h2></td>
<td align="center"><h2>BLOOD GROUP</h2></td>

</tr>
EOL;
while($row=mysqli_fetch_assoc($results))
{
$ENo=$row['ENo'];
$VolName=$row['VolName'];
$VolDept=$row['VolDepartment'];
$VolYear=$row['VolYear'];
$VolBatch=$row['VolBatch'];
$Volgen=$row['VolSex'];
$Voldob=$row['VolDob'];
$Volbd=$row['VolBg'];
echo<<<EOL
<tr>
<form action="print.php"  method='post'>
<td align="center"><h3><input type="text" name="ENo" value=$ENo readonly="readonly"></h3></td>
<td align="center"><h3>$VolName</h3></td>
<td align="center"><h3>$VolDept</h3></td>
<td align="center"><h3>$VolYear</h3></td>
<td align="center"><h3>$VolBatch</h3></td>
<td align="center"><h3>$Volgen</h3></td>
<td align="center"><h3>$Voldob</h3></td>
<td align="center"><h3>$Volbd</h3></td>
</form>
</tr>
EOL;
}
echo<<<EOL
<center>
<form action="print.php"  method='post'>
<h3><input type="submit" name="PRINT" value="PRINT">&nbsp;&nbsp;<a href="sec_home.html"><input type="button" value="BACT TO HOME"></a></h3>
</form>
</center>
EOL;
?>