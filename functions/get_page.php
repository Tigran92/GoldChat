<?php
//gets the html page
if (isset($_POST['link'])) {
	$link = $_POST['link'];
	switch ($link) {
		case 'Global Chat' :
			//include 'templates/home.html';
			break;
		case 'Local Chat' :
			//include 'templates/settings.html';		
			break;
		case 'Group Chat' :
			include '../templates/load_group_page.html';		
			break;			
		case 'Settings' :
			include '../templates/settings.html';		
			break;					
		case 'Logout' :
			unset($_SESSION["user"]);
			include '../index.php';		
			break;				
	}
}

if(isset($_GET['settings'])) {
	$settings = $_GET['settings'];
	switch ($settings) {
		case 'Bio' :
			include 'templates/home.html';
			break;
		case 'Radius' :
			include 'templates/settings.html';
			break;
	}
}

?>
