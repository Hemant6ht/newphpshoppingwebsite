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
    $res=mysqli_query($con,$q);
    $num=mysqli_num_rows($res);
    if(isset($_GET['type']))
    {
        $pid=$_GET['id'];
        $qr="select * from products where p_id='$pid'";
        $rs=mysqli_query($con,$qr);
        $row= mysqli_fetch_array($rs);
    }
    else
    {
        header('location:./categories.php'); 
    }
    
    if(isset($_POST['sbt']))
    {
        $pname=$_POST['p_name'];
        $psdesc=$_POST['p_s_desc'];
        $pfdesc=$_POST['p_f_desc'];
        $pquant=$_POST['p_quant'];
        $pprice=$_POST['p_price'];
        $pstatus=$_POST['p_status'];
        $catid=$_POST['catid'];
        $file_name=$_FILES['p_img']['name'];
        if($file_name=='')
        {
            $qry="UPDATE  products SET p_name='$pname',p_s_desc='$psdesc',p_f_desc='$pfdesc',p_status=$pstatus,p_quant=$pquant,p_price=$pprice,catid=$catid WHERE p_id=$pid";
        }
        else
        {
            $file_tmp=$_FILES['p_img']['tmp_name'];
            $imgsrc="./images/product_images/".$file_name;
            $upldimg=".".$imgsrc;
            move_uploaded_file($file_tmp,$upldimg);
            $qry="UPDATE  products SET p_name='$pname',p_s_desc='$psdesc',p_f_desc='$pfdesc',p_status=$pstatus,p_quant=$pquant,p_img='$imgsrc',p_price=$pprice,catid=$catid WHERE p_id=$pid";
            
        }
        mysqli_query($con,$qry);
        header('location:./product.php');
        
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
                        <div class="card-header"><strong>Product Add</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product name" class=" form-control-label">Product Name</label>
                                <input type="text" id="p_name" placeholder="Enter the name of the Product" class="form-control" name="p_name" value="<?php echo $row['p_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="product short desc" class=" form-control-label">Product Short Descriptiion</label><br>
                                <textarea name="p_s_desc" style="margin-top: 0px; margin-bottom: 0px; height: 126px;padding:8px 8px; width: 100%;border:0.5px solid lightgray;border-radius:7px"><?php echo $row['p_s_desc']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product full desc" class=" form-control-label">Product Full Descriptiion</label><br>
                                <textarea name="p_f_desc" style="margin-top: 0px; margin-bottom: 0px; height: 150px;padding:8px 8px; width: 100%;border:0.5px solid lightgray;border-radius:7px"><?php echo $row['p_f_desc']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="quant" class=" form-control-label">Product Quantity</label>
                                <input type="number" id="quant" placeholder="Enter the quantity available" class="form-control" name="p_quant" value=<?php echo $row['p_quant']?>>
                            </div>
                            <div class="form-group">
                                <label for="product price" class=" form-control-label">Product Price</label>
                                <input type="number" id="catname" placeholder="Enter the price of product" class="form-control" name="p_price" value=<?php echo $row['p_price']?>>
                            </div>
                            <div class="form-group">
                                <label for="product status status" class="form-control-label">Status of Product</label>
                                <select class="form-control" name="p_status">
                                    <option value=1>Available</option>
                                    <option value=0>Unavailable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product category" class="form-control-label">Product category</label>
                                <select class="form-control" name="catid">
                                    <?php for($i=0;$i<$num;$i++) 
                                     { $rowarr= mysqli_fetch_assoc($res);
                                    ?>
                                    <option value=<?php echo $rowarr['catid'] ?>><?php echo $rowarr['catname'] ?></option>
                                <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image location" class="form-control-label">Select Product Image</label>
                                <input type="file" name="p_img" id="p_img" class="form-control" accept="image/*">
                            </div>
                           <input  id="payment-button" type="submit" name="sbt" class="btn btn-lg btn-info btn-block" value="Add Product">
                           </button>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php require('footer.php'); ?>