<?php
session_start();
require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dukan-Home</title>
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
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
            <?php
                $qp="SELECT * FROM products WHERE p_status=1 ORDER BY RAND() LIMIT 3";
                $resp=mysqli_query($con,$qp);
                $nmp=mysqli_num_rows($resp);
                if($nmp>3)
                    $nmp=3;
                for($i=0;$i<$nmp;$i++){
                    $rwp=mysqli_fetch_assoc($resp);
            ?>
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection <?php echo date("Y");?></h2>
                                        <h1 style="font-size:3rem"><?php echo $rwp['p_name'];?></h1>
                                        <div class="cr__btn">
                                        <?php echo "<a href='./buy.php?pid=".$rwp['p_id']."' class='fr__btn' style='margin-left:8px;background-color:green'>";?>BUY NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src=<?php echo $rwp['p_img'];?> alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <?php }?>
                <!-- Start Single Slide -->
                
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>These are the latest collection from Dukan take a look</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr))">
                            <?php
                            $qp="SELECT * FROM products WHERE p_status=1 ORDER BY p_id DESC";
                            $resp=mysqli_query($con,$qp);
                            $nmp=mysqli_num_rows($resp);
                            if($nmp>12)
                                $nmp=12;
                            for($i=0;$i<$nmp;$i++){
                                $rwp=mysqli_fetch_assoc($resp);
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12" style="width:100%">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <?php echo "<a href='./productdetails.php?pid=".$rwp['p_id']."'>"?>
                                            <img src=<?php echo $rwp['p_img'];?> alt="product images" height="320px">
                                        </a>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href=<?php echo "'./productdetails.php?pid=".$rwp['p_id']."'"?>><?php echo $rwp['p_name'];?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li><?php echo "Rs. ".$rwp['p_price'];?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
<?php require('./footer.php')?>
       