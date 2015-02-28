<?php
ob_start();
session_start();
#unseting the admin session data.
unset($_SESSION['user_account']['user_id']);
unset($_SESSION['user_account']['user_name']);	 
unset($_SESSION['user_account']['user_email']);
unset($_SESSION['user_account']['role_id']);
header("location:login");
?>