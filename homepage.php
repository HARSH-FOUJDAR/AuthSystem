<?php 
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome- <?php echo $_SESSION['username']?></title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <style>
    .back-img {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1; /* Lower value sits behind */
}
   </style>
</head>
<body>

  <img style="
      width: 100%;
      height: 100vh;
      position: absolute;
      z-index: -1;
      opacity : 0.5;
  " src="https://png.pngtree.com/thumb_back/fw800/background/20251118/pngtree-team-of-programmers-collaborating-in-a-modern-office-environment-working-on-image_20426161.webp" alt="">
  <?php require "components/nav.php" ?>
   <div class="container" style="margin-top:3rem;">
     <div class="alert " role="alert">
  <h4 class="alert-heading" style="font-size: xx-large;
    color: #e7007e;
    font-weight: 700;
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}">Welcome <?php echo $_SESSION['username']?></p></h4>
  <p style="
    color: darkblue;font-weight: 500;
">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0" style="font-weight: 900;
    color: brown;">Whenever you need to, be sure to logout <a style="color: mediumblue;
    font-family: system-ui;" href="/AuthSystem/logout.php">Click on this link  Link</a> </p>
</div>
   </div>


</body>
</html>