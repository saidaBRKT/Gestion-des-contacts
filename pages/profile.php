<?php
session_start();
require_once("Process.php");
require_once("config.php");
require_once('./library.php');
if(!isLoged()){
  header('location:./sign-in.php');
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    <!-- Navbar -->
    <?php require_once("navbar.php");?>
    <!-- content -->
    <h2 class="text-center my-5 pb-5">Welcome  <?php if(isset($_SESSION["username"])){echo $_SESSION["username"];}?></h2>
    <div class="container d-flex justify-content-center align-item-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 profile">
        <img src="../Assets/images/profile.png" alt="profile">
        <div>
          <table class="table table-borderless mt-4 fs-5 ">
            <tbody>
              <tr>
                  <th>Username :</th>
                  <td><?= $_SESSION["username"]?></td>
              </tr>
              <tr>
                  <th>Signup date :</th>
                  <td>
                    <?php 
                      $date = new DateTime($_SESSION["date"]);
                      echo $date->format(DATE_RFC2822); 
                    ?>
                  </td>
              </tr>
              <tr>
                  <th>Last login :</th>
                  <td><?= $_SESSION["lastLog"] ?></td>
              </tr> 
            </tbody>
          </table>  
        </div>
      </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="../Assets/js/my-bootstrap.js"></script>
<script src="../Assets/js/javaS.js"></script>
<script src="../Assets/js/contactsJS.js"></script>
</body>
</html>