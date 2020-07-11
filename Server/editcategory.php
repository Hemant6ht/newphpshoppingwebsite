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
    if(isset($_GET['type']))
    {
        $catid=$_GET['id'];
        require('./connect.php');
        $qry="select * from categories where catid='$catid'";
        $res=mysqli_query($con,$qry);
        $rowarr= mysqli_fetch_array($res);
    }
    else
    {
        header('location:./categories.php'); 
    }
    if(isset($_POST['sbt']))
    {
        $catname=$_POST['catname'];
        $status=$_POST['status'];
        $qry="update categories set catname='$catname',status='$status' where catid='$catid'";
        $res=mysqli_query($con,$qry);
        header('location:./categories.php');
    }
}
else
    header('location:./serverlogin.php');
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
<?php  require('./header.php');?>
        <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Category Add</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <form method="POST">
                           <div class="form-group">
                                <label for="category name" class=" form-control-label">Category Name</label>
                                <input type="text" id="catname" placeholder="Enter the name of the category" class="form-control" name="catname" value=<?php echo $rowarr['catname']; ?>>
                           </div>
                           <div class="form-group">
                                <label for="category status" class="form-control-label">Status of category</label>
                                <select class="form-control" name="status">
                                    <option value=0>Pending</option>
                                    <option value=1>Publish</option>
                                </select>
                            </div>
                           <input  id="payment-button" type="submit" name="sbt" class="btn btn-lg btn-info btn-block" value="Add Category">
                           </button>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php require('footer.php'); ?>