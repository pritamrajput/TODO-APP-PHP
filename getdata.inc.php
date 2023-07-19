<?php

include "config.php";

function getData($dates,$con){
   $sql = "select * from tbltodo WHERE date = '$dates'";
   $data = mysqli_query($con, $sql);
   return $data;
}

if(!(isset($_GET['date']))) { 
              $currentdate = date('Y-m-d');
              $todayDateData = getData($currentdate,$con);
  }
  else{
          $choosendate =  $_GET['date'];
          $choosenDateData = getData($choosendate,$con);
  }


?>


