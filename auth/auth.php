<?php
session_start();
if(!$_SESSION['login']) {
	header("location: auth/login.php");
	exit;
}
?>