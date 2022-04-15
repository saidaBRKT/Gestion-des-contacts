<?php   
    //logout.php  
    session_start(); 
    require_once('library.php');
    if(!isLoged()){
    header('location:./sign-in.php');
    die();
    } 
    session_unset();
    session_destroy();  
    header("location:../index.php");  
    exit();
 ?>  

