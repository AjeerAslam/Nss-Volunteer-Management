<?php

$con=mysqli_connect("localhost","root","","nss");
if(mysqli_connect_error())
{
	echo "connection failed";
}else{
	echo "connected";
}

?>