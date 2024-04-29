<?php
session_start();
// Include database connection file
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
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
    <title>Users - Multi-level Affiliate Payout System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('menu.php'); ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                    <h1 class="h2">Users</h1>
                    <a href="newusers.php">
                        <input type="button" name="submit" value="New Users" class="btn btn-primary pull-right">
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $role = $_SESSION['ID'];
                            $query = "SELECT * FROM admins WHERE parent = $role";
                           
                            $result = $con->query($query);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_array()) {
                        ?>  
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo date('d-M-Y', strtotime($row['created']))?></td>
                            </tr>
                        <?php $i++; }
                            }else{
                            echo "<h2>No record found!</h2>";
                        } ?>         
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>  
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        feather.replace();
    </script>   
</body>
</html>