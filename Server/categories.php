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
        $q="select * from categories";
        $res= mysqli_query($con,$q);
        $num= mysqli_num_rows($res);
        if(isset($_GET['type']) && $_GET['type']!='')
        {
            if($_GET['type']=='status')
            {
                $oper=$_GET['operation'];
                $catid=$_GET['id'];
                if($oper=='pending')
                    $stat=0;
                else
                    $stat=1;
                    
                    $qry="update categories set status='$stat' where catid='$catid'";
                    mysqli_query($con,$qry);
                    header('location:./categories.php');
            }
            else if($_GET['type']=='delete')
            {
                    $catid=$_GET['id'];
                    $qry="delete from categories where catid='$catid'";
                    mysqli_query($con,$qry);
                    header('location:./categories.php');
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
                           <h4 class="box-title">Manage Users</h4>
                           <a href="./addcategory.php" style="font-size:13px;color:blue;">Add New Category</a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Category Id</th>
                                       <th>Category Name</th>
                                       <th>Delete</th>
                                       <th>Edit</th>
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
                                       <td class="serial"><?php echo $rowarr['catid']; ?></td>
                                       <td><?php echo $rowarr['catname']; ?> </td>
                                       <td> <span class="name"><?php echo "<a href='?type=delete&id=".$rowarr['catid']."' class='btn btn-danger'>Delete</a>";?></span>
                                    </td>
                                       <td> <span class="product"><?php echo "<a href='./editcategory.php?type=edit&id=".$rowarr['catid']."' class='btn btn-primary'>Edit</a>";?></span> </td>
                                       <td>
                                          <?php 
                                          if($rowarr['status']==1)
                                            echo "<a href='?type=status&operation=pending&id=".$rowarr['catid']."' class='btn active-user'>Published</a>";
                                          else
                                            echo "<a href='?type=status&operation=publish&id=".$rowarr['catid']."' class='btn blocked-user'>Pending...</a>";
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