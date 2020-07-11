<?php
session_start();
require('./connect.php');
$qry="select * from categories where status=1";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
$msglgn="";
$msgreg="";
if(isset($_SESSION['user']))
{
    header('location:./index.php');
}
if(isset($_POST['registersbt']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $pass=$_POST['password'];
    $add=$_POST['address'];
    $qr="insert into users(email,name,mobile,password,address,status) values('$email','$name','$mobile','$pass','$add',1)";
    $rs=mysqli_query($con,$qr);
    $n=mysqli_affected_rows($con);
    if($n==1)
        $msgreg="Successfully Registered";
    else
        $msgreg="<font color='red'>Error</font>"; 
}
if(isset($_POST['loginsbt']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $qr="select * from users where email='$email' and password='$pass'";
    $rs=mysqli_query($con,$qr);
    $nm=mysqli_num_rows($rs);
    if($nm!=1)
        $msglgn="<font color='red'>Wrong Credentials</font>"; 
    else
    {
        $rowarr=mysqli_fetch_assoc($rs);
        if($rowarr['status']==1)
        {
            $_SESSION['user']=$email;
            header('location:./index.php');
        }
        else
        {
            $msglgn="<font color='red'> Sorry you are temporarely Blocked</font>";  
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dukan-Login/Register</title>
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
<?php require('./header.php'); ?> ;
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
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="POST">
                                    <div class="form-output">
                                        <p class="form-messege"><?php echo $msglgn; ?></p>
                                    </div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%" required>
										</div>
									</div>
									
									<div class="contact-btn">
										<input name="loginsbt" value="Login" type="submit" class="fv-btn">
									</div>
								</form>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="POST">
                                    <div class="form-output">
                                        <p class="form-messege" style="color:green"><?php echo $msgreg; ?></p>
                                    </div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Name*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%" required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="mobile" placeholder="Your Mobile*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%" required>
										</div>
                                    </div>
                                    <div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="address" placeholder="Your Address*" style="width:100%">
										</div>
									</div>
									<div class="contact-btn">
										<input value="Register" type="submit" class="fv-btn" name="registersbt">
									</div>
								</form>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
<?php require('./footer.php'); ?>