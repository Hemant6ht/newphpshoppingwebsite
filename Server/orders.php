<?php session_start(); 
if(isset($_GET['action'])&&$_GET['action']!='')
{
   unset($_SESSION['admin']);
   header('location:./index.php');
}
?>
<?php
if(isset($_SESSION['admin']))
{
        require('./connect.php');
        $q="select * from orders";
        $res= mysqli_query($con,$q);
        $num= mysqli_num_rows($res);
        if(isset($_GET['type']) && $_GET['type']!='')
        {
        $oper=$_GET['operation'];
        $orderid=$_GET['id'];
        if($oper=='deliver')
            $stat=1;
        else
            $stat=0;
            
            $qry="update orders set status='$stat' where orderid='$orderid'";
            mysqli_query($con,$qry);
            header('location:./orders.php');
        }
}
else
{
    header('location:./serverlogin.php');
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>ADMIN PANNEL</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="images/d.png">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/styleown.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
<?php require('./header.php');?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Manage Orders</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Order Id</th>
                                       <th class="avatar">Product Image</th>
                                       <th>Product Name</th>
                                       <th>User</th>
                                       <th>Quantity</th>
                                       <th>Total Price</th>
                                       <th>Mode of payment</th>
                                       <th>Delivery Address</th>
                                       <th>Delivery Contact</th>
                                       <th>Recipient Name</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                <?php
                                for($i=0;$i<$num;$i++)
                                    {
                                     $rowarr= mysqli_fetch_assoc($res);
                                ?>
                                    <tr>
                                       <td class="serial"><?php echo $rowarr['orderid']; ?></td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src=<?php echo ".".$rowarr['p_img']; ?> alt=""></a>
                                          </div>
                                       </td>
                                       <td><?php echo $rowarr['p_name']; ?></td>
                                       <td><?php echo $rowarr['user']; ?></td>
                                       <td><?php echo $rowarr['quantity']; ?></td>
                                       <td><?php echo $rowarr['total']; ?></td>
                                       <td><?php echo $rowarr['mpo']; ?></td>
                                       <td><?php echo $rowarr['address']; ?></td>
                                       <td><?php echo $rowarr['mobile']; ?></td>
                                       <td><?php echo $rowarr['recpname']; ?></td>
                                       <td>
                                          <?php 
                                          if($rowarr['status']==1)
                                            echo "<a href='?type=status&operation=pending&id=".$rowarr['orderid']."' class='btn active-user'>Delivered</a>";
                                          else
                                            echo "<a href='?type=status&operation=deliver&id=".$rowarr['orderid']."' class='btn blocked-user'>Pending..</a>";
                                          ?>
                                          
                                       </td>
                                    </tr>
                                    <?php }
                                     mysqli_close($con);
                                    ?>  
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php require('./footer.php'); ?>