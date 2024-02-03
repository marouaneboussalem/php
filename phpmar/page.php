<?php 
$proprietaire=$_POST['proprietaire'];
$type=$_POST['type'];
$solde=$_POST['solde'];
require 'conn.php';
if(is_numeric($solde)){
$requete="INSERT INTO `compte`(`proprietaire`, `type`, `solde`) VALUES ('$proprietaire','$type','$solde')";
$query=mysqli_query($con,$requete);
//header("location:index.php");
}
else{
   // echo"<script>alert('num')</script>";
}


?>