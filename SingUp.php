<?php 
$showalert = false;
$showError = false;

$exits = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
include "components/Db.php";



$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST["confirmpassword"];
// $exits = false;


$checkuser = "SELECT *  from `user's` where name= '$username'";
$result = mysqli_query($conn, $checkuser);
$numexitsrow = mysqli_num_rows($result);
if($numexitsrow >0){
  $exits = true;
}
else {
if($password == $confirmpassword && $exits == false){
  $sql = "INSERT INTO `user's` (`name`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result){
    $showalert = true;
  }
  header("location: Login.php");
}
else {
$showError = true;
}
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SingUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
     <img style="
      width: 100%;
      height: 100vh;
      position: absolute;
      z-index: -1;
      opacity : 0.5;
  " src="https://png.pngtree.com/thumb_back/fh260/background/20230209/pngtree-tiredness-hits-software-engineer-as-night-wears-on-photo-image_49721828.jpg" alt="">
<?php include "components/nav.php"?>
<?php
if(isset($showalert)&& $showalert){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong style="display:flex;
     justify-content: center ">Your Form Data Successfully Submitted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
 <div class="container" style="display: flex; gap: 5rem; margin-top: 10rem; justify-content: center; padding: 5rem;  width: 500px; height: auto; border: 2px solid #9385df;
 border-radius: 1rem; margin-left: auto; margin-right: auto; box-shadow: 0 0 15px rgba(61, 42, 160, 0.5);">
  <div class="container items-center">

<form action="/AuthSystem/SingUp.php" method="POST" class="form">
    <h3 class="text-center" style="   font-family: serif;
    font-weight: revert;color: #730ed1">SingUp Here</h3>
  <div class="mb-3 my-5">
    <label for="userName" class="form-label" style="font-family: serif;
    font-weight: revert;color: #730ed1;">UserNmae</label>
    <input type="text" class="form-control"  name="username" placeholder="Enter Your Full Name" style="2px solid #807ee7" required />

  </div>
    <div class="mb-3 ">
    <label for="password"  class="form-label" style="font-family: serif;
    font-weight: revert;color: #730ed1;">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" style="2px solid #807ee7" required/>
  </div>
  <div class="mb-3">
    <label for="confirmpassword" class="form-label" style="font-family: serif;
    font-weight: revert;color: #730ed1;">Confirm Password</label>
    <input type="password" password="confirmpassword" class="form-control" name="confirmpassword" placeholder="Confirm Password" required style="2px solid #807ee7"/>
  </div>
  <?php
 if(isset($showError) && $showError){
  echo '<div class="alert alert-danger" role="alert" style="padding: 7px;;    
     justify-content: center;
     display: flex;
    font-family: monospace;">
  Your Paasword Do not match  psl try again ! 
  </div>';
 }
   ?>
   <?php 
    if($exits){
      echo '<div class="alert alert-danger" role="alert" style="padding:2px;     justify-content: center;
    display: flex;
    font-family: monospace;">
      UserName is Already Exits 
  </div>';
  }
   ?>
   
  <button type="submit" class=" btn btn-primary " style=" display:flex; justify-content:center; align-items:center; width:100%">SingUp</button>
</form>
  </div>
</div>
</body>
</html>