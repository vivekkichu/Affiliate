<?php
  // Include database connection file
  include_once('config.php');
  if (isset($_POST['submit'])) {
    
    $username     = $con->real_escape_string($_POST['username']);
    $password     = $con->real_escape_string(md5($_POST['password']));
    $name         = $con->real_escape_string($_POST['name']);
    $email        = $con->real_escape_string($_POST['email']);
    $mobile       = $con->real_escape_string($_POST['mobile']);
    $address      = $con->real_escape_string($_POST['address']);
    $parent_level = $con->real_escape_string($_POST['parent_level']);

    $query  = "INSERT INTO `admins` (`name`, `username`, `password`, `email`, `mobile`, `address`, `level`) VALUES ('$name', '$username', '$password', '$email', '$mobile', '$address', '$parent_level')";
    $result = $con->query($query);
    $last_id = $con->insert_id; 

    $upquery = "UPDATE `admins` SET `parent` = '$last_id' WHERE `id` = '$last_id'";
    $upresult = $con->query($upquery);

    if ($result==true) {
      header("Location:login.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register - Multi-level Affiliate Payout System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="card text-center" style="padding:20px;">
  <h3>Multi-level Affiliate Payout System</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" maxlength="191">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" required="" maxlength="190">
          </div>
          <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" required="" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)">
          </div>
          <div class="form-group">  
            <label for="address">Address</label>
            <textarea class="form-control" name="address" placeholder="Enter Address" required=""></textarea>
          </div>
          <div class="form-group">  
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <input type="hidden" name="parent_level" value="1">

          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
<script>
  function isNumberKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

    return true;
  }
</script>
</body>
</html>