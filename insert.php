<?php
   include "config.php";
 if(isset($_POST['list'])){

   $LIST = $_POST['list'];
   if($LIST != ''){
              $sql = "INSERT INTO `tbltodo`(`list`) VALUES ('$LIST')";
              mysqli_query($con, $sql);
              header("location:todoApp.php");
          }
     else{
             header("location:todoApp.php");
            } 
     }
?>