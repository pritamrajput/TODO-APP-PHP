<?php

include "config.php";


function redirectToTaskHome(){
    if(isset($_GET['date'])){
        $url = $_GET['date'];
        header("location:todoApp.php?date=$url");
      }
   else{
       header("location:todoApp.php");
   }
}


function addTask($con){
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
}


function deleteTask($con){
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_GET['ID'];
    $sql = "DELETE FROM `tbltodo` WHERE id = $id";
    mysqli_query($con,$sql);
    redirectToTaskHome();

 }
}



function completedTask($con){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $id = $_GET['ID'];
        $checkFlag = $_GET['check'];

       $checkFlag ? $sql = "UPDATE `tbltodo` SET `done`='0' WHERE id = $id" : $sql = "UPDATE `tbltodo` SET `done`='1' WHERE id = $id";

      mysqli_query($con, $sql);
       redirectToTaskHome();
   }
}


// for choosing which operation you want to perform on the task list
if($_GET['action']==1){
    addTask($con);
}
else if($_GET['action']==0) {
    completedTask($con);
}
elseif ($_GET['action']==-1) {
    deleteTask($con);
}

?>