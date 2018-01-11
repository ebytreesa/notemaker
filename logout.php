<?php

session_start();

session_destroy();
$_SESSION['success'] = "You are now logged out";
header('Location: index.php');
exit;
