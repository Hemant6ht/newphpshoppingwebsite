<?php
session_start();
if(!isset($_SESSION['user']))
    header('location:./loginregister.php');

require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
$qw="select * from orders where user='$_SESSION[user]'";
$rsw=mysqli_query($con,$qw);
$nmw=mysqli_num_rows($rsw);
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dukan-My Orders</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="images/d.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

      <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   </head>

<body>
<?php require('./header.php')?>
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
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">OrderId</th>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-thumbnail">Quantity</th>
                                            <th class="product-price">Total Price</th>
                                            <th class="product-price">Delivery Address</th>
                                            <th class="product-remove">Mobile Number</th>
                                            <th class="product-price">Delivery Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i=0;$i<$nmw;$i++){
                                        $rwarw=mysqli_fetch_assoc($rsw);
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><?php echo $rwarw['orderid'];?></td>
                                            <td class="product-thumbnail"><a href="#"><img src=<?php echo $rwarw['p_img'];?> alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $rwarw['p_name'];?></a></td>
                                            <td class="product-price"><?php echo $rwarw['quantity'];?></td>
                                            <td class="product-price"><?php echo "Rs. ".$rwarw['total'];?></td>
                                            <td class="product-price"><?php echo $rwarw['address'];?></td>
                                            <td class="product-price"><?php echo $rwarw['mobile'];?></td>
                                            <td class="product-price">
                                            <?php if($rwarw['status']==0)
                                                    echo "<span class='btn btn-warning' style='cursor:text'>Will be delivered soon...</span>";
                                                  else
                                                    echo "<span class='btn btn-success'>Delivered...</span>";
                                            ?>
                                            </td>
                                        </tr>
                                        <?php }?>
                
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="./index.php">Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
<?php require('./footer.php')?>
       