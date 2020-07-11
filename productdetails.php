<?php
session_start();
require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
if(isset($_GET['pid'])&&$_GET['pid']!='')
{
    $id=$_GET['pid'];
    $q="select * from products where p_id='$id' and p_status=1";
    $rs=mysqli_query($con,$q);
    $nm=mysqli_num_rows($rs);
    if($nm==0)
        header('location:./index.php');
    $rwar=mysqli_fetch_assoc($rs);
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
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src=<?php echo $rwar['p_img']; ?> alt="full-image" height="450px" width="330px">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $rwar['p_name']; ?></h2>
                                <ul  class="pro__prize">
                                    <li><?php echo "Rs. ".$rwar['p_price']; ?></li>
                                </ul>
                                <p class="pro__info"><?php echo $rwar['p_s_desc']; ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span>
                                        <?php if($rwar['p_quant']>0)
                                                {echo "In Stock";}
                                            else{ echo "Out Of Stock";}
                                             ?>
                                        </p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><?php echo $rwar['catid']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <?php echo "<a href='./cartproduct.php?pid=".$rwar['p_id']."' class='fr__btn'>";
                                        if(isset($_GET['msg']))
                                            echo $_GET['msg'];
                                        else
                                            echo "Add To Cart";
                                        ?></a>
                                        <?php echo "<a href='./buy.php?pid=".$rwar['p_id']."' class='fr__btn' style='margin-left:8px;background-color:green'>";?>BUY NOW</a>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <?php
                                            if(isset($_GET['error']))
                                                echo "<font color='red' size='4rem'>".$_GET['error']."</font>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <p><span style="font-size:1.5rem;color:red">Warning: </span>There may be slight diffrence between colors of image and actual product duw to internal lights.</p>
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $rwar['p_s_desc']; ?></p>
                                    <h4 class="ht__pro__title">Detailed Description</h4>
                                    <p><?php echo $rwar['p_f_desc']; ?></p>
                                    </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>Latest arrivals tou may like of this category</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <?php
                        $qp="select * from products where catid=".$rwar['catid']." and p_status=1 ORDER BY p_id DESC";
                        $rsp=mysqli_query($con,$qp);
                        $nmp=mysqli_num_rows($rsp);
                        if($nmp>4)
                            $nmp=4;
                        for($i=0;$i<$nmp;$i++){
                            $rwarp=mysqli_fetch_assoc($rsp);
                        ?>
                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <?php echo "<a href='./productdetails.php?pid=".$rwarp['p_id']."'>"?>
                                        <img src=<?php echo $rwarp['p_img'] ?> alt="product images" height="320px">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html"><?php echo $rwarp['p_name']?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li><?php echo "Rs. ".$rwarp['p_price']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
<?php require('./footer.php')?>
       