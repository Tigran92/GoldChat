<?php
session_start();
require('../../includes/db_connect.php');

/* $searchGroup = "";
$searchGroup .= "
	<div id = 'searchMenu'>
	<form method = 'POST'>
	<input type = 'text' name = 'searchInput' placeholder = 'Search for a group...' />
	<input type = 'submit' name = 'searchButton' value = 'Search' />
	</form>
	</div>
	
";
echo $searchGroup; */

if(isset($_SESSION['user'])) {

	$sql = "SELECT * FROM groupChat
	INNER JOIN subscribe ON groupChat.id = subscribe.group_id
	WHERE subscribe.user_id = ".$_SESSION['user']['id']."
	";

	$result = mysqli_query($link, $sql);

	$listOfGroup = "<div id ='listedGroup'>";
	while ($data = mysqli_fetch_row($result)) {
		$listOfGroup .= "
		<div class = 'openGroup'>
		<form method = 'POST'>
		<img src='data:image/jpeg;base64,".base64_encode( $data[1] )."'/>
		<a>".$data[3]."</a>
		<p>".$data[2]."</p>
		<input name ='groupID' type='hidden' value='".$data[0]."' />
		<input type='submit' value='Open group'>
		</form>
		</div>
		";
	}
	$listOfGroup .= "</div>";


	echo $listOfGroup;

}
?>