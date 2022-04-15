<?php
session_start();
require_once("Process.php");
require_once("config.php");
require_once('./library.php');
if(!isLoged()){
  header('location:./sign-in.php');
  die();
}
$data=new contacts();
$all=$data->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Contacts</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    <!-- Navbar -->
    <?php require_once("navbar.php");?>
    <!-- toast -->
    <?php if (isset($_SESSION['message'])) : ?>
      <div class="d-flex justify-content-center">
        <div class="text-white fw-bold w-50 bg-<?= $_SESSION['type_msg'] ?> border-0 my-3 mx-5 py-4 px-5">
            <div class="d-flex justify-content-between">
                <svg class="flex-shrink-0 me-2" width="10" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div class="text-center">
                    <?php
                    echo '<i class="fa-solid fa-check"></i>'.' '.$_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['type_msg']);
                    ?>
                </div>
                <a href='?' class="btn-close btn-close-white me-2 m-auto"></a>
            </div>
        </div>
      </div>
    <?php endif  ?>
    <!-- content -->
    <div class="container mt-3">
        <div class="contact">
            <h2 class="fs-2 fs-sm-5">Contacts lists :</h2>
            <button type="button" class="plus text-success" onclick="displayADD()"><i class="fas fa-plus "></i></button>
        </div>
        <!-- <div class="row mt-2"> -->
            <div class="add h-70 mx-auto p-3 col-11 col-sm-6"  style="display:none;border: 2px solid #12CE81;border-radius: 20px;" id="add">
              <form class="bg-white p-3 " action="accueil.php" method="post" >
                <div class="d-flex justify-content-end">
                  <button type="button" class="plus text-danger " onclick="window.location.href='accueil.php'" >X</i></button>
                </div>
                <div class="mb-2 d-none"> 
                  <label for="id" class="form-label text-secondary">id</label>
                  <input type="text" class="form-control" id="id" name="id"  placeholder="Enter name" value="<?= $id_edit ?? '' ?>">
                  <small></small>
                </div>
                <div class="mb-2"> 
                  <label for="name" class="form-label text-secondary">Username</label>
                  <input type="text" class="form-control" id="name" name="name"   value="<?= $name_edit ?? '' ?>" placeholder="Enter name">
                  <small></small>
                </div>
                <div class="mb-2"> 
                  <label for="phone" class="form-label text-secondary">Phone</label>
                  <input type="text" class="form-control" id="phone"name="phone"   value="<?= $phone_edit ?? '' ?>" placeholder="Enter phone">
                  <small></small>
                </div>
                <div class="mb-2"> 
                  <label for="email" class="form-label text-secondary">Email</label>
                  <input type="email" class="form-control" id="email"name="email"   value="<?= $email_edit ?? '' ?>" placeholder="Enter email">
                  <small></small>
                </div>
                <div class="mb-4 mb-sm-2">
                  <label for="addr" class="form-label text-secondary"  >Address</label>
                  <input type="text" class="form-control" id="addr"name="address"   value="<?= $address_edit ?? '' ?>" placeholder="Enter address">
                  <small></small>
                </div>
                  <?php 
                    if($update == true):
                  ?>     
                  <input type="submit" class="btn text-white w-100 btn-warning" name="updateData" value="Update">
                  <?php 
                    else:
                  ?>  
                  <input type="submit" class="btn text-white w-100" name="add" style="background-color: #12CE81"   value="Save"> 
                  <?php 
                    endif;
                  ?> 

              </form>
            </div>
        <!-- </div> -->
        <div class="table-responsive">
          <table class="table table-hover mt-4">
            <thead></thead>
            <tbody>
              <?php foreach($all as $key=>$val){?>
                <tr>
                  <th><?=$val['name']?></th>
                  <td><?=$val['phone']?></td>
                  <td><?=$val['email']?></td>
                  <td><?=$val['address']?></td>
                  <td >
                    <div class="d-flex justify-content-between justify-content-lg-evenly">
                    <a href="accueil.php?edit=<?=$val['id']?>" class="d-flex d-lg-none text-decoration-none"><i class="fal fa-pen text-warning"></i></a>
                    <a href="accueil.php?id=<?=$val['id']?>&req=delete" class="d-flex d-lg-none text-decoration-none"><i class="fal fa-trash text-danger mx-1"></i></a>
                    <a class="btn btn-warning d-none d-lg-flex" href="accueil.php?edit=<?=$val['id']?>" onclick="displayADD()" >Update</a>
                    <a class="btn btn-danger d-none d-lg-flex" href="accueil.php?id=<?=$val['id']?>&req=delete" >Delete</a>
                    </div>  
                  </td>
                </tr>
              <?php } ?>  
            </tbody>
         </table>
        </div>
      </div>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
      <script src="../Assets/js/my-bootstrap.js"></script>
      <script src="../Assets/js/contactJS.js"></script>
      <?php 
          if(isset($_GET['edit'])){?>
          <script>
            document.getElementById("add").style.display="block"
          </script>
      <?php } ?>    
</body>
</html>