<?php
//session_start();
include_once '../Class/Account.php';

extract($_POST);

if($_POST['submit']=='Sign In'){
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $user = new Account(NULL,$email, md5($password),'Seller',NULL,NULL,'0');
    $user->login();

    
    
    
    $_SESSION['loggeduser'] = $email;

    
    
    $_SESSION['validated'] = true;
}

