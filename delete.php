<?php
 include "config.php";

 $id = $_GET['ID'];
 $sql = "DELETE FROM `tbltodo` WHERE id = $id";
 mysqli_query($con,$sql);

if(isset($_GET['date'])){
      $url = $_GET['date'];
      header("location:todoApp.php?date=$url");
   }
   else{
       header("location:todoApp.php");
   }
?>