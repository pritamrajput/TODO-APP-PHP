<?php

   include "config.php";
   $id = $_GET['ID'];
   $checkFlag = $_GET['check'];
   if($checkFlag == '1'){
      $sql = "UPDATE `tbltodo` SET `done`='0' WHERE id = $id";
   }
   else if($checkFlag == '0') {
      $sql = "UPDATE `tbltodo` SET `done`='1' WHERE id = $id";
   }

   mysqli_query($con, $sql);
   // echo var_dump(isset($_GET['date']));
   if(isset($_GET['date'])){
      $url = $_GET['date'];
      header("location:todoApp.php?date=$url");
   }
   else{
       header("location:todoApp.php");
   }
?>