<?php
session_start();

//**sql db connection ?


//**header

include('templates/header.html');



//**body

if(isset($_SESSION["user"])) {
	include('templates/find_group_page.html');
} else {
	include('templates/login.html');
}




include('functions/get_page.php');

//**footer
include('templates/footer.html');



?>
