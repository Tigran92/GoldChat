<?php
session_start();
//remeber to start session on index.php

//change dir
require('../../includes/db_connect.php');

include('../../templates/load_chat_page.html');

$sql = "SELECT * FROM groupChat WHERE id = ".$_POST["groupID"];

$result = mysqli_query($link, $sql);
if($row = mysqli_fetch_assoc($result)) {
	$_SESSION["group"] = $row;
	//include('../../templates/main_page.html');
	//echo "<p>". $_SESSION["user"]["firstname"] ."</p>"; 
	//echo "<p>". $row["lastname"] ."</p>";
	//echo "<img src='data:image/jpeg;base64,".base64_encode( $_SESSION["user"]['avatar'] )."'/>";
} else {
	echo "failed";
}

$img = "<img style ='float:left;height:30px;' src='data:image/jpeg;base64,".base64_encode($_SESSION['group']['avatar'])."'/>";
$name = "<p style ='font-size: 20px;'>".$_SESSION['group']['name']."</p>";
echo '
<script type="text/javascript">
$("#chat_title").html("'.$img.$name.'");
</script>
';



?>