<?php 

if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true){
  $loggin = true;
}
else {
  $loggin = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Navbar</title>
</head>
<body>
  <nav class="navbar text-light  navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">GV-Secure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item text-light">
          <!-- <a class="nav-link active text-light" aria-current="page" href="/AuthSystem/homepage.php">Home</a> -->
        </li>
     <?php
     if(!$loggin){
      echo '<li class="nav-item text-light">
          <a class="nav-link text-light" href="/AuthSystem/login.php">Login</a>
        </li>
           <li class="nav-item text-light">
          <a class="nav-link text-light" href="/AuthSystem/SingUp.php">SingUp</a>
        </li>
        </li>';
     }
     else {
      echo ' <li class="nav-item text-light">
          <a class="nav-link text-light" href="/AuthSystem/logout.php">Logout</a>
        </li>';
     }
      ?>
  
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success text-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>