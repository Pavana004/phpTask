<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  header("Location: profile.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $dob = $_POST["dob"];
  $contact = $_POST["contact"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM userdatas WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO userdatas VALUES('','$name','$username','$email','$password','$dob','$contact')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
     <div class="container">
      <div class="row mt-2">
      <div class="col mt-5">
       <h2>Registration</h2>
       <a href="login.php" class="btn bg-primary" >Login</a>
       </div>
       <div class="col ">
      <form  action="" method="post" class="frm " >
      <label for="name">Name  </label>
      <input type="text" name="name" id = "name" required value="" class="form-control"> <br>
      <label for="username">Username  </label>
      <input type="text" name="username" id = "username" required value="" class="form-control"> <br>
      <label for="email">Email  </label>
      <input type="email" name="email" id = "email" required value="" class="form-control"> <br>
      <label for="password">Password  </label>
      <input type="password" name="password" id = "password" required value="" class="form-control"> <br>
      <label for="confirmpassword">Confirm Password  </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value="" class="form-control"> <br/>
      <label for="dob">DOB  </label>
      <input type="text" name="dob" id = "dob" required value="" class="form-control"><br/>
      <label for="contact">Contact </label>
      <input type="text" name="contact" id = "contact" required value="" class="form-control"> <br/>
      <button type="submit" class="btn bg-primary" name="submit">Register</button>
    </form>
         </div>
     
    </div>
     </div>
   
  </body>
</html>