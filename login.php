<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:dashboard.php");
      exit();
  }
  // Include database connectivity
    
  include_once('config.php');
  
  if (isset($_POST['submit'])) {
      $errorMsg = "";
      $username = $con->real_escape_string($_POST['username']);
      $password = $con->real_escape_string(md5($_POST['password']));
      
  if (!empty($username) || !empty($password)) {
        $query  = "SELECT * FROM admins WHERE `username` = '$username' AND `password` = '$password'";
        $result = $con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['LEVEL'] = $row['level'];
            $_SESSION['NAME'] = $row['name'];
            header("Location:dashboard.php");
            die();                              
        }else{
          $errorMsg = "No user found on this username";
        } 
    }else{
      $errorMsg = "Username and Password is required";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Multi-level Affiliate Payout System</title>
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
            <label for="username">Username:</label> 
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="" maxlength="191">
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="" maxlength="191">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="index.php"> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>