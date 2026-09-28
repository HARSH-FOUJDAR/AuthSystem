<?php

  $login = false;
  $showerro = false;

if($_SERVER["REQUEST_METHOD"]== "POST"){
include "components/Db.php";
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT *  FROM  `user's` 
          WHERE name ='$username'
          AND  password = '$password'";

          
  $result = mysqli_query($conn, $sql);
  $num =   mysqli_num_rows($result);

  if($num == 1){
  $login = true;
  session_start();
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
  header("location: homepage.php");
  }
  else{
    $showerro = true;
  }
}


 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
      <img style="
      width: 100%;
      height: 100vh;
      position: absolute;
      z-index: -1;
      opacity : 0.5;
  " src="https://images.pexels.com/photos/34804002/pexels-photo-34804002.jpeg" alt="">
    <?php 
    require 'components/nav.php';
    ?>
 <?php
    if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong style="display:flex;
     justify-content: center ">You are Logged in Successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
  <div class="container" style="display: flex; gap: 5rem; margin-top: 10rem; justify-content: center; padding: 5rem;  width: 500px; height: auto; border: 2px solid #9385df;
 border-radius: 1rem; margin-left: auto; margin-right: auto; box-shadow: 0 0 15px rgba(61, 42, 160, 0.5);">

<form action="/AuthSystem/Login.php" method="POST">
  <h3 class="font-weight-bold" style="display:flex; justify-content:center;    font-family: serif;
    font-weight: revert;color: #730ed1;
}">Login Here</h3>
  <div class="mb-3 mt-5">
    <label for="exampleInputEmail1" class="form-label" style="color: blueviolet;
    text-align: center;
    font-family: serif;">UserName</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Your Full Name" requiredstyle="2px solid #807ee7">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color: blueviolet;
    text-align: center; font-family: serif;
    font-weight: revert;color: #730ed1;">Password</label>
    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Your Password" style="2px solid #807ee7" required>
      <div id="emailHelp" class="form-text" style="color: #8b3e03;">We'll never share your password with anyone else.</div>
  </div>
  <div class="mb-3 form-check">
    <?php 
    if($showerro){
      echo '<P style="color: red;
    font-size: larger;
    font-family: -webkit-body;
    text-align: center;
    justify-content: center;">Invelid UserName & Password</P>';
    }
    ?>
  </div>
  <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
</form>


    </div>
  </body>
</html>
