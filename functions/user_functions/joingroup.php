<?php
session_start();
require('../../includes/db_connect.php');

$group_id = $_POST['groupID'];

$sql = "INSERT INTO subscribe (user_id,group_id) VALUES (".$_SESSION['user']['id'].", ".$group_id.")";
mysqli_query($link, $sql);

header("Location: ../../index.php");
?>