<?php
session_start();
//remeber to start session on index.php



//change dir
require('../../includes/db_connect.php');

$currentLog = $_GET["currentLog"];


//maybe change sql statement
$sql = "
SELECT userDetails.username, userDetails.avatar, messageLog.message FROM 
(
    SELECT id 
    FROM messageLog
    WHERE messageLog.group_id = ".$_SESSION["group"]["id"]."
    ORDER BY id
    LIMIT $currentLog,1024
) sudo
INNER JOIN messageLog
ON sudo.id = messageLog.id
INNER JOIN userDetails
ON userDetails.id = messageLog.user_id
ORDER BY messageLog.id
";


$result = mysqli_query($link, $sql);
while($data = mysqli_fetch_row($result))
{
	echo "
	<div>
	<img style='height:15px;' src='data:image/jpeg;base64,".base64_encode( $data[1] )."'/>
	<p style='display:inline-block; font-size: 15px;'>$data[0]: $data[2]</p>
	</div>";
}



?>