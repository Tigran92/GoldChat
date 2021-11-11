<?php
session_start();
//remeber to start session on index.php

//change dir
require('../../includes/db_connect.php');



//register

$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']); # ***
$firstname = strip_tags($_POST['firstname']);
$lastname = strip_tags($_POST['lastname']);
$email = strip_tags($_POST['email']);

//***
if (isset($_FILES['image']['name'])) {
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); # important need addslash to fix sql statement
} else {
	$image = null;
}

//check if username is unique *** change the function more complex
$sql = "SELECT * FROM userDetails WHERE username = '$username' ";
$result = mysqli_query($link, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows == 0) {
	$sql = "INSERT INTO 
	userDetails (username,password,avatar,firstname,lastname,email) 
	VALUES ('$username','$password','$image','$firstname','$lastname','$email')";
	mysqli_query($link, $sql);
	echo "<p>Account created!</p>";
} else {
	echo "<p>username needs to be unique</p>";
}






/* if(isset($_POST['username'])) {
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
	
	if(strlen($username) > 3) {
		if($password == $repeatpassword) {
			$sql = "SELECT * FROM userDetails WHERE name = '$username' ";
			$result = mysqli_query($link, $sql);
			$num_rows = mysqli_num_rows($result);
			if($num_rows == 0) {
				$sql = "INSERT INTO userDetails (name,password) VALUES ('$username','$password')";
				mysqli_query($link, $sql);
				
				echo "<p>Account created!</p>";
				
				
			} else {
				echo "<p>Theres a username called ".$username ."</p>";
			}
		} else {
			echo "<p>password does not match</p>";
		}
	} else {
		echo "<p>your name is too short.</p>";
	}
} */


?>