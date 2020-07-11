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
        $q="select * from contact";
        $res= mysqli_query($con,$q);
        $num= mysqli_num_rows($res);
        if(isset($_GET['type']) && $_GET['type']!='')
        {
            $id=$_GET['id'];
            if($_GET['type']=='delete')
            {
                $p_id=$_GET['id'];
                $qry="delete from contact where id='$id'";
                $res=mysqli_query($con,$qry);
                mysqli_error($con);
                header('location:./contact.php');
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
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>subject</th>
                                       <th>Message</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                <?php
                                for($i=0;$i<$num;$i++)
                                    {
                                     $rowarr= mysqli_fetch_assoc($res);
                                ?>
                                    <tr>
                                       <td><?php echo $rowarr['name']; ?> </td>
                                       <td><?php echo $rowarr['email']; ?></td>
                                       <td><?php echo $rowarr['subject']; ?> </td>
                                       <td><?php echo $rowarr['message']; ?></td>
                                       <td><span><?php echo "<a href='?type=delete&id=".$rowarr['id']."' class='btn btn-danger'>Delete</a>" ?></span></td>
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