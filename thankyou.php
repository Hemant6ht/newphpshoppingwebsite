<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('location:./index.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/d.png">
    <link rel="stylesheet" href="./css/thanks.css">
    <title>Dukan-Thankyou</title>
</head>
<body>
    <div class="main_container">
        <div class="thankyou_img">
            <img src="./images/thank.jpg" alt="thankyou"/>
        </div>
        <div class="user_name">
            <h2><?php echo $_SESSION['user']; ?></h2>
        </div>
        <div class="navigate">
            <a class="btn btnshoping" href="./index.php">Continue Shoping</a>
            <a class="btn btnorder"href="./orders.php">My Orders</a>
        <div>
    </div>
</body>
</html>