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
    <title>Products - Multi-level Affiliate Payout System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('menu.php'); ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                    <h1 class="h2">Our Products</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $query = "SELECT * FROM products WHERE Discontinued = '0'";
                           
                            $result = $con->query($query);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_array()) {
                        ?>  
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['ProductName']?></td>
                                <td><?php echo $row['UnitPrice']?></td>
                                <td><?php echo $row['UnitsInStock']?></td>
                                <td>
                                	<button data-bs-toggle="modal" data-bs-target="#myModal<?php echo $i; ?>" class="btn btn-sm btn-primary pull-center" <?php if($row['UnitsInStock'] == '0') {?> disabled <?php } ?>>Buy Now</button>
                                </td>
                            </tr>

                            <div class="modal" id="myModal<?php echo $i; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">

							      <!-- Modal Header -->
							      <div class="modal-header">
							        <h4 class="modal-title">Buy Now</h4>
							        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							      </div>

							      <!-- Modal body -->
							      <div class="modal-body">
							       <p> Product Name : <?php echo $row['ProductName']; ?></p>
							       <p> Unit Price : <?php echo $row['UnitPrice']; ?></p>
							       <p> Stock : <?php echo $row['UnitsInStock']; ?></p>
							       <form action="buynow.php" method="POST">
							          <input type="hidden" name="buyerid" value="<?php echo $_SESSION['ID']; ?>">
							          <input type="hidden" name="productid" value="<?php echo $row['ProductID']; ?>">
							          <input type="hidden" name="unitprice" value="<?php echo $row['UnitPrice']; ?>">
							          <input type="hidden" name="stock" value="<?php echo $row['UnitsInStock']; ?>">
							          <input type="hidden" name="date" value="<?php echo date('Y-m-d H:s'); ?>">

							          <div class="form-group">  
							            <label for="role">Quantity:</label>
							            <select class="form-control" name="qty" required="">
							              <option value="">Select Quantity</option>
							              <?php for($j=1; $j<=$row['UnitsInStock']; $j++) { ?>
							              <option value="<?php echo  $j; ?>"><?php echo  $j; ?></option>
							          	  <?php } ?>
							            </select>
							          </div>
							          <div class="form-group">
							          	<p>&nbsp;</p>
							            <input type="submit" name="submit" value="Buy Now" class="btn btn-primary">
							          </div>
							      </form>

							      </div>

							      <!-- Modal footer -->
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							      </div>

							    </div>
							  </div>
							</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        feather.replace();
    </script>   
</body>
</html>