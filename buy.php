<?php
session_start();
require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
if(isset($_GET['pid'])&& $_GET['pid']!='')
{
    $pid=$_GET['pid'];
   if(!isset($_SESSION['user']))
   {
    header("location:./productdetails.php?pid=$pid&error=Please Login First");
   }
   else
   {
       $qr="select * from products where p_id='$pid'";
       $rs=mysqli_query($con,$qr);
       $roww=mysqli_fetch_assoc($rs);
       $qru="select * from users where email='$_SESSION[user]'";
       $rsu=mysqli_query($con,$qru);
       $rowu=mysqli_fetch_assoc($rsu);
   }
}
else
{
    header('location:./index.php');
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dukan-Checkout</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="images/d.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/own.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

      <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   </head>

<body>
<?php require('./header.php')?>
  <!-- End Header Area -->
  <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <form action="ordered.php" method="POST">
                                <div class="order-details__item">
                                    <div class="single-item">
                                        <div class="single-item__thumb">
                                            <img src=<?php echo $roww['p_img'];?> alt="ordered item">
                                        </div>
                                        <div class="single-item__content">
                                            <a href="#"><?php echo $roww['p_name'];?></a>
                                            <span class="price"><?php echo "Rs. ".$roww['p_price'];?></span>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="single-item__content">
                                            <label for="quantity">Quantity</label><br>
                                            <input class="buyfrm" type="number" id="quant" name="quantity" value="1" onChange="setprice()" min="1" max="5">
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="single-item__content">
                                            <label for="mobile">Contact No.</label><br>
                                            <input class="buyfrm" type="number" name="mobile" value=<?php echo $rowu['mobile'];?>>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="single-item__content">
                                            <label for="address">Delivery Address</label><br>
                                            <textarea class="buyfrm" name="address"><?php echo $rowu['address'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="single-item__content">
                                            <label for="name">Name of the recipient</label><br>
                                            <textarea class="buyfrm" name="name"  style="height:30px"><?php echo $rowu['name'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="single-item__content">
                                            <label for="mop">Select the Mode of Payment</label><br>
                                            <select name="paymentmode" class="buyfrm">
                                                <option value="COD">Cash on delivery</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordre-details__total">
                                    <h5>Order total</h5>
                                    <span class="price">Rs. <input type="number" name="total_price" id="total_price" readonly style="padding:0.2rem 1rem;width:100px"></span>
                                </div>
                                <div class="importantinfo_data">
                                    <input type="number" name="pid" value=<?php echo $roww['p_id'];?> hidden>
                                    <input type="text" name="imgsrc" value=<?php echo $roww['p_img'];?> hidden>
                                    <input type="text" name="pname" value="<?php echo $roww['p_name'];?>" hidden>
                                </div>
                                <div class="ordre-details__total">
                                    <input type="submit" name="sbt" value="ORDER NOW" class="sbtbtn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end --> 
        <script>
            var x=document.getElementById('quant');
            var y=document.getElementById('total_price');
            y.value=<?php echo $roww['p_price'];?>*x.value;
            function setprice(){
                y.value=<?php echo $roww['p_price'];?>*x.value;
            } 
        </script>  
<?php require('./footer.php')?>

       