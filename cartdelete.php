<?php
session_start();
if(isset($_GET['pid']) && $_GET['pid']!='')
{
  $pid=$_GET['pid'];
  if(isset($_SESSION['user']))
  {
    require('./connect.php');
    $qry="delete from cart where pid='$pid' and user='$_SESSION[user]'";
    mysqli_query($con,$qry);
    header('location:./cart.php');
  }
  else
  {
      header('location:./loginregister.php');
  }
}
else
    header('location:./cart.php');