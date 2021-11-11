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
	WHERE groupChat.id NOT IN 
	(SELECT id FROM groupChat 
	INNER JOIN subscribe ON groupChat.id = subscribe.group_id 
	WHERE subscribe.user_id = ".$_SESSION['user']['id'].")
	";

	if (isset($_POST['searchInput'])) {
		$searchInput = strip_tags($_POST['searchInput']);
		if(strlen($searchInput) > 0) {
			echo "<p> You searched for: " . $searchInput;
			$sql .= " AND groupChat.name LIKE '%".$searchInput."%'";
			
		} 
	}

	$result = mysqli_query($link, $sql);

	$listOfGroup = "<div id ='listedGroup'>";
	while ($data = mysqli_fetch_row($result)) {
		$listOfGroup .= "
		<div class = 'listedGroupSelect'>
		<form action = 'functions/user_functions/joingroup.php' method = 'POST'>
		<img src='data:image/jpeg;base64,".base64_encode( $data[1] )."'/>
		<a>".$data[3]."</a>
		<p>".$data[2]."</p>
		<input name ='groupID' type='hidden' value='".$data[0]."' />
		<input type='submit' value='Join group'>
		</form>
		</div>
		";
	}
	$listOfGroup .= "</div>";

	echo $listOfGroup;
	
}

?>