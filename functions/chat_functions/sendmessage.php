<?php
session_start();
//remeber to start session on index.php

//change dir
require('../../includes/db_connect.php');


//register

if(isset($_POST['message'])) {
	$message = strip_tags($_POST['message']);
	$sql = "INSERT INTO messageLog (message,user_id,group_id) VALUES ('$message',".$_SESSION["user"]["id"].",".$_SESSION["group"]["id"].")";
	mysqli_query($link, $sql);
}
echo $sql;

?>