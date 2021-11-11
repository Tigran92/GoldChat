<?php
session_start();
//remeber to start session on index.php
//change dir
require('../../includes/db_connect.php');



//settings
$email = $_SESSION['user']['email'];
$username = $_SESSION['user']['username'];
$firstname = $_SESSION['user']['firstname'];
$lastname = $_SESSION['user']['lastname'];
$password = $_SESSION['user']['password'];

if(strip_tags($_POST['email']) != '') {
	$email = strip_tags($_POST['email']);
}
if(strip_tags($_POST['username']) != '') {
	$username = strip_tags($_POST['username']);
}
if(strip_tags($_POST['firstname']) != '') {
	$firstname = strip_tags($_POST['firstname']);
}
if(strip_tags($_POST['lastname']) != '') {
	$lastname = strip_tags($_POST['lastname']);
}
if(strip_tags($_POST['password']) != '') {
	$password = strip_tags($_POST['password']);
}


$id = $_SESSION['user']['id'];
$sql = "UPDATE userDetails 
		SET username = '$username', 
		password = '$password', 
		email = '$email',
		firstname = '$firstname',
		lastname = '$lastname' 
		WHERE id = $id";
		
if ($link->query($sql) === TRUE) { 
	echo "<p>Record updated successfully</p>";
} else {
	echo "<p>failed to updated</p>";
}
?>