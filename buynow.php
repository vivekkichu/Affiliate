<?php
session_start();
// Include database connection file
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

if (isset($_POST['submit'])) {
  
  $buyerid     = $con->real_escape_string($_POST['buyerid']);
  $productid   = $con->real_escape_string($_POST['productid']);
  $unitprice   = $con->real_escape_string($_POST['unitprice']);
  $qty         = $con->real_escape_string($_POST['qty']);
  $date        = $con->real_escape_string($_POST['date']);
  $stock       = $con->real_escape_string($_POST['stock']);

  // Percentage calculation starts from here

  $total = $unitprice * $qty; 

  $qry = "SELECT `id`, `level`, `parent` FROM `admins` WHERE `id` = $buyerid";
  $result = $con->query($qry);
  $row = $result->fetch_assoc();
  $level = $row['level']; 
   $parent = $row['id']; 

  for($k=0;$k<=$level;$k++)
  {
    
    if($parent!=0)
    {
      $rqry = "SELECT `level`, `parent` FROM `admins` WHERE `id` = $parent";
      $rresult = $con->query($rqry);
      $rrow = $rresult->fetch_assoc();
      $levels = $rrow['level'];
      $parent = $rrow['parent'];

      if($levels<6)
      {
        if($levels == 5) { $com = '1'; }
        elseif($levels == 4) { $com = '2'; }
        elseif($levels == 3) { $com = '3'; }
        elseif($levels == 2) { $com = '5'; }
        elseif($levels == 1) { $com = '10'; }

        $commision = ($total * $com) / 100;

        $query  = "INSERT INTO `commision` (`userid`, `product`, `amount`, `commision`, `date`) VALUES ('$parent', '$productid', '$total', '$commision', '$date')";
        $result = $con->query($query);
      }
    }
    
  }

  // Update stock in the table

  $pending_stock = $stock - $qty;

  $upquery  = "UPDATE `products` SET `UnitsInStock` = '$pending_stock' WHERE `ProductID` = '$productid'"; 
  $upresult = $con->query($upquery);

  //Update Purchase table

  $purquery  = "INSERT INTO `purchase` (`userid`, `productid`, `amount`, `qty`, `date`) VALUES ('$buyerid', '$productid', '$total', '$qty', '$date')";
  $purresult = $con->query($purquery);

  if ($purresult==true) {
    header("Location:products.php");
    $errorMsg  = "Purchase Completed Succesfully!!";
    die();
  }else{
    echo $errorMsg  = "Something went wrong..Please Try again";
  }  

  
}
?>