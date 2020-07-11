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
        $q="select * from products";
        $res= mysqli_query($con,$q);
        $num= mysqli_num_rows($res);
        if(isset($_GET['type']) && $_GET['type']!='')
        {
            if($_GET['type']=='status')
            {
                $oper=$_GET['operation'];
                $p_id=$_GET['id'];
                if($oper=='inactive')
                    $stat=0;
                else
                    $stat=1;
                $qry="update products set p_status='$stat' where p_id='$p_id'";
                mysqli_query($con,$qry);
                header('location:./product.php');
            }
            else if($_GET['type']=='delete')
            {
                $p_id=$_GET['id'];
                $qry="delete from products where p_id='$p_id'";
                $res=mysqli_query($con,$qry);
                mysqli_error($con);
                header('location:./product.php');
            }
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
                           <h4 class="box-title">Manage Products</h4>
                           <a href="./addproduct.php" style="font-size:13px;color:blue;">Add New Product</a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Product Id</th>
                                       <th class="avatar">Image</th>
                                       <th>Name</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Category</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
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
                                       <td class="serial"><?php echo $rowarr['p_id']; ?></td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="" src=<?php echo ".".$rowarr['p_img']; ?> alt=""></a>
                                          </div>
                                       </td>
                                       <td><?php echo $rowarr['p_name']; ?> </td>
                                       <td> <span class="product"><?php echo $rowarr['p_price']; ?></span> </td>
                                       <td><span><?php echo $rowarr['p_quant']; ?></span></td>
                                       <td><span><?php echo $rowarr['catid']; ?></span></td>
                                       <td> <span class="product"><?php echo "<a href='./editproduct.php?type=edit&id=".$rowarr['p_id']."' class='btn btn-primary'>Edit</a>";?></span> </td>
                                       <td><span><?php echo "<a href='?type=delete&id=".$rowarr['p_id']."' class='btn btn-danger'>Delete</a>" ?></span></td>
                                       <td>
                                          <?php 
                                          if($rowarr['p_status']==1)
                                            echo "<a href='?type=status&operation=inactive&id=".$rowarr['p_id']."' class='btn active-user'>Active</a>";
                                          else
                                            echo "<a href='?type=status&operation=active&id=".$rowarr['p_id']."' class='btn blocked-user'>Inactive</a>";
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