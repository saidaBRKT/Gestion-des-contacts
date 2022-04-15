<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.html">
        <img src="../Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ms-auto fs-5 d-flex flex-sm-row justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php">
           <?php echo $_SESSION["username"];?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="accueil.php">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>