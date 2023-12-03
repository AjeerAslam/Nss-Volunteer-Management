<?php
include("connect.php");
if(isset($_POST['Register'])) {
$VolName=$_POST['VolName'];
$VolEmail=$_POST['VolEmail'];
$VolBg=$_POST['VolBg'];
$VolBatch=$_POST['VolBatch'];
$VolDob=$_POST['VolDob'];
$VolDepartment=$_POST['VolDepartment'];
$VolYear=$_POST['VolYear'];
$VolSex=$_POST['VolSex'];
  
  $query="INSERT INTO volunteer(VolName,VolEmail,VolBg,VolBatch,VolDob,VolDepartment,VolYear,VolSex,VolStatus,SecVolId,VolOfficerId)VALUES('$VolName','$VolEmail','$VolBg','$VolBatch','$VolDob','$VolDepartment','$VolYear','$VolSex','Requested',3000000,400000)";
  $results = mysqli_query($con,$query);
  if(!$results){
    echo "An error occur" ;
  }else{
    echo "inserted";
    header('Location: volunteerreg.html');
  }
}
?>


