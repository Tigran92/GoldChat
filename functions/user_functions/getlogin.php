<?php
session_start();
//remeber to start session on index.php



//change dir
require('../../includes/db_connect.php');

//change name tag
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);



//maybe change sql statement
$sql = "SELECT * FROM userDetails WHERE username = '$username' AND password = '$password' ";



$result = mysqli_query($link, $sql);
if($row = mysqli_fetch_assoc($result)) {
	$_SESSION["user"] = $row;
	//include('../../templates/main_page.html');
	//echo "<p>". $_SESSION["user"]["firstname"] ."</p>"; 
	//echo "<p>". $row["lastname"] ."</p>";
	//echo "<img src='data:image/jpeg;base64,".base64_encode( $_SESSION["user"]['avatar'] )."'/>";
} else {
	echo "failed";
}



?>