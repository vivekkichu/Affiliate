<?php
session_start();
// Include database connection file
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

if (isset($_POST['submit'])) {
  
  $username     = $con->real_escape_string($_POST['username']);
  $password     = $con->real_escape_string(md5($_POST['mobile']));
  $name         = $con->real_escape_string($_POST['name']);
  $email        = $con->real_escape_string($_POST['email']);
  $mobile       = $con->real_escape_string($_POST['mobile']);
  $address      = $con->real_escape_string($_POST['address']);
  $parent_level = $con->real_escape_string($_POST['parent_level']);
  $parent       = $con->real_escape_string($_POST['parent']);

  $query  = "INSERT INTO `admins` (`name`, `username`, `password`, `email`, `mobile`, `address`, `level`, `parent`) VALUES ('$name', '$username', '$password', '$email', '$mobile', '$address', '$parent_level', '$parent')";
  $result = $con->query($query);
  if ($result==true) {
    header("Location:users.php");
    $errorMsg  = "Resistartion Completed Succesfully!!";
    die();
  }else{
    $errorMsg  = "You are not Registred..Please Try again";
  }   
}
?>
<style type="text/css">
    .nav-link{
 color: #f9f6f6 !important;
 font-size: 14px;
    } 
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Multi-level Affiliate Payout System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('menu.php'); ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                    <h1 class="h2">New Users</h1>

                    <a href="users.php">
                        <input type="button" name="back" value="Back" class="btn btn-primary pull-right">
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-12">      
                      <?php if (isset($errorMsg)) { ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $errorMsg; ?>
                        </div>
                      <?php } ?>
                      <?php $level = $_SESSION['LEVEL'] + 1; ?>
                      <form action="" method="POST">
                        <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" maxlength="190">
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
                          <input type="text" class="form-control" name="username" placeholder="Enter Username" required="" maxlength="190">
                        </div>
                        <input type="hidden" name="parent_level" value="<?php echo $level; ?>">
                        <input type="hidden" name="parent" value="<?php echo $_SESSION['ID']; ?>">
                        
                        <div class="form-group">
                          <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                </div>
            </main>
        </div>
    </div>  
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        feather.replace();

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