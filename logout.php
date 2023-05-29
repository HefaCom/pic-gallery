<?php
session_start();
session_destroy();

	// redirecting the user to the login page
	header('Location: login.php');
    exit();
    ?>