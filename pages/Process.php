<?php

$update = false;

if(isset($_POST['save'])){
    require("config.php");
    $sc = new user($_POST['username'], $_POST['password']);
    $sc->signup();
    header("location:sign-in.php");
}

if(isset($_POST['login'])){
    require("config.php");
    $message="";
    if(!empty($_POST["username"]) && !empty($_POST["password"])){  
        $sc = new user($_POST['username'], $_POST['password']);   
        $bool=$sc->login();    
        if($bool != null){ 
            $check = $_POST['check'] ?? ''; 
            if($check === "on"){
                setcookie('username', $_POST["username"], time() + 3600 * 24);
                setcookie('password', $_POST["password"], time() + 3600 * 24);
           }else{
                setcookie('username');
                setcookie('password');
           }
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["id"] = $bool['id'];
            $_SESSION["date"] = $bool['date_signUp'];
            date_default_timezone_set('UTC');
            $_SESSION["lastLog"] = date(DATE_RFC2822);
            header("location:profile.php");
        }
        else
        $message="wrong data";
    }  
    else{
        $message = 'All fields are required';
    }
}

if(isset($_POST['add'])){
    require("config.php");
    $update = false;
    $sc = new contacts();
    $sc->setName($_POST['name']);
    $sc->setPhone($_POST['phone']);
    $sc->setAddress($_POST['address']);
    $sc->setEmail($_POST['email']);
    $sc->createCmpt();
    $_SESSION['message'] = 'contact was created successfully';
    $_SESSION['type_msg'] = 'success';
    header("location:accueil.php");
    die();
}

if(isset($_POST['updateData'])){
    require("config.php");
    $sc = new contacts();
    $sc->setName($_POST['name']);
    $sc->setPhone($_POST['phone']);
    $sc->setAddress($_POST['address']);
    $sc->setEmail($_POST['email']);
    $sc->setId($_POST['id']);
    $sc->updateCmpt();
    $_SESSION['message'] = 'contact was updated successfully';
    $_SESSION['type_msg'] = 'warning';
    header("location:accueil.php");
    die();
}

if(isset($_GET['edit'])){
    require("config.php");
    $update = true;
    $sc = new contacts();
    $myContact = $sc->getContactById($_GET['edit']);
    $id_edit = $myContact['id'];
    $phone_edit = $myContact['phone'];
    $name_edit = $myContact['name'];
    $address_edit = $myContact['address'];
    $email_edit = $myContact['email'];
}

if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req']=="delete"){
        require("config.php");
        $sc = new contacts();
        $sc->setId($_GET['id']);
        $sc->deleteCmpt();         
        $_SESSION['message'] = 'contact was deleted successfully';
        $_SESSION['type_msg'] = 'danger';
        header("location:accueil.php");
        die();
    }
}

?>