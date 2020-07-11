<?php
session_start();
require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
$msg="";
if(isset($_GET['id'])&&$_GET['id']!='')
{
    $id=$_GET['id'];
    $q="select * from products where catid='$id' and p_status=1";
    $rs=mysqli_query($con,$q);
    $nm=mysqli_num_rows($rs);
    if($nm==0)
        $msg="<h2 style='margin-top:2rem;margin-left:2%;'>Sorry no product found....</h2>";
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
      <title>Dukan-Product</title>
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
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col">
                        
                            <!-- Start Product View -->
                                
                                    <?php echo $msg;?>
                                    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr)">
                                        <!-- Start grid view of product Product -->
                                        <?php for($i=0;$i<$nm;$i++){
                                            $rwar=mysqli_fetch_assoc($rs);
                                            ?>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="width:100%">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <?php echo "<a href='./productdetails.php?pid=".$rwar['p_id']."'>"?>
                                                        <img src=<?php echo $rwar['p_img'] ?> alt="product images" height="320px">
                                                    </a>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html"><?php echo $rwar['p_name'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li><?php echo "Rs. ".$rwar['p_price']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <!-- End Single Product -->
                                    </div>
                                
                          
                            <!-- End Product View -->
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
<?php require('./footer.php')?>
       