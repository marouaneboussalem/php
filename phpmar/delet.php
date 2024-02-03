<?php 
require 'conn.php';
$id=$_GET['id'];
$sql="DELETE FROM compte where idcompte = '$id'";
$queryy  = mysqli_query ($con,$sql);
header("location:index.php");
?>
