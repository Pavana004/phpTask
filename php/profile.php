<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM userdatas WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
       <div class="col">
       <a href="logout.php" class="btn bg-warning">Logout</a>
       <a href="update.php " class="btn bg-primary">Update</a>
       </div>
       <div class="col">
        <h1>Welcome to home -  <?php echo $row["name"]?></h1>
        <br/>
         <h4>Email- <?php echo $row["email"]?></h4>
         <hr/>
          <h4>Username- <?php echo $row["username"]?></h4>
          <hr/>
          <h4>DOB-<?php echo $row["dob"]?></h4>
          <hr/>
          <h4>Contact-<?php echo $row["contact"]?></h4>
          <hr/>
        </div>

      </div>
    </div>
    
  </body>
</html>