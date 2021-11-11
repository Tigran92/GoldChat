<?php
//$link = mysqli_connect('localhost','root','','groupchatdb') or die ("error in connection");
$link = mysqli_connect('localhost','softprojb','password123','softprojb_groupchatdb') or die ("error in connection");

if (mysqli_connect_errno()) {
	exit(mysqli_connect_error());
}

?>