<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM userdatas WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $dob = $_POST["dob"];
  $contact = $_POST["contact"];
  $query = "UPDATE userdatas SET username='$username',email='$email',dob='$dob',contact='$contact' WHERE id =$id";
  $redict= mysqli_query($conn, $query);

  if($redict){
    header("Location: profile.php");

  }else{
    echo
    "<script> alert('Update failed'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update</title>
</head>
<body>
<div class="container">
      <div class="row mt-5">
      <div class="col">
       <h2>Update</h2>
       </div>
       <div class="col">
       <form  action="" method="post" class="frm md-4" >
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value="<?php echo $row["name"]?>" class="form-control  "> <br>
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value="<?php echo $row["username"]?>" class="form-control"> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value="<?php echo $row["email"]?>" class="form-control"> <br>
      <label for="dob">DOB  </label>
      <input type="text" name="dob" id = "dob" required value="<?php echo $row["dob"]?>" class="form-control"><br/>
      <label for="contact">Contact </label>
      <input type="number" name="contact" id = "contact" required value="<?php echo $row["contact"]?>" class="form-control"> <br/>
      <button type="submit" class="btn bg-primary" name="submit">Update</button>
    </form>
  </div>
   </div>
     </div>
</body>
</html>