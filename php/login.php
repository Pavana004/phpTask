<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  header("Location: profile.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM userdatas WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: profile.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
         <div class="col">
           <h2>Login</h2>
           <a href="register.php" class="btn bg-primary">Registration</a>
         </div>
          <div class="col">
          <form action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value="" class="form-control"> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value="" class="form-control"> <br>
      <button type="submit" name="submit" class="btn bg-primary">Login</button>
    </form>
          </div>
      </div>
    </div>
    
   
   
  </body>
</html>