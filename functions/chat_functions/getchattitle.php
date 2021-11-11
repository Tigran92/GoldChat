<?php
session_start();
require('../../includes/db_connect.php');
	//echo "<p>". $row["lastname"] ."</p>";
	
echo "<img src='data:image/jpeg;base64,".base64_encode( $_SESSION["group"]["avatar"] )."'/>";
echo "<p>".$_SESSION["group"]["name"]."</p>";

?>