<?php
require_once 'includes/functions.php';

if (isLoggedIn()) {
    redirect('pages/dashboard.php');
 } else {
    redirect('auth/login.php');
 }
 
 ?>