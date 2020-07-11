<?php
session_start();
if(isset($_GET['pid']) && $_GET['pid']!='')
{
  $pid=$_GET['pid'];
  if(isset($_SESSION['user']))
  {
    require('./connect.php');
    $qry="INSERT INTO cart(user,pid) VALUES('$_SESSION[user]','$pid')";
    mysqli_query($con,$qry);
    header("location:./productdetails.php?pid=$pid&msg=Added");
  }
  else
  {
    header("location:./productdetails.php?pid=$pid&error=Please Login First");
  }
}
else
{
    header('location:./index.php');
}