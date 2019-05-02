<?php
session_start();

//check if session variable is registered

if(session_is_registered('email') || session_is_registered('name') || session_is_registered('admin'))
{

	//session variable registered, user is ready to logout

session_unset();
session_destroy();

}
	header('Location: login.php');


?>


