<?php

include "config.php";


// function to redirect
function redirectToTaskHome(){
    if(isset($_GET['date'])&&$_GET['search']!=''){
        $search = $_GET['search'];
        $url = $_GET['date'];
        $request = $_GET['request'];
        header("location:todoApp.php?search=$search&date=$url&request=$request");
      }
    else if(isset($_GET['date'])){
        $url = $_GET['date'];
        header("location:todoApp.php?date=$url");
    }
    elseif ($_GET['search']!='') {
      $search = $_GET['search'];
      header("location:todoApp.php?search=$search");
    }
   else{
       header("location:todoApp.php");
   }
}

// function to add a task
function addTask($newTask){
   global $con;
   $sql = "INSERT INTO `tbltodo`(`list`) VALUES ('$newTask')";
   mysqli_query($con, $sql);
   return 'added';
}

// function to delete a task
function deleteTask($taskId){
    global $con;
    $id = $taskId;
    $sql = "DELETE FROM `tbltodo` WHERE id = $id";
    mysqli_query($con,$sql);
    return 'deleted';
 }



// function to set if the task is completed
function completedTask($taskId){
        $id = $taskId;
        $checkFlag = $_GET['check'];
        global $con;
        $checkFlag ? $sql = "UPDATE `tbltodo` SET `done`='0' WHERE id = $id" : $sql = "UPDATE `tbltodo` SET `done`='1' WHERE id = $id";
        mysqli_query($con, $sql);
        return 'completed';
}

function completedTaskAll($taskId){
        $id = $taskId;
        global $con;
        $sql = "UPDATE `tbltodo` SET `done`='1' WHERE id = $id";
        mysqli_query($con, $sql);
        return 'completed';
}



// for choosing which operation you want to perform on the task list
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   if($_GET['action']==1){
      $isTaskAdded = addTask($_POST['list']);
      if($isTaskAdded == 'added'){
        redirectToTaskHome();
       }
     }
    else if($_GET['action']==0) {
      $isTaskcompleted =  completedTask($_GET['ID']);
      if($isTaskcompleted == 'completed'){
        echo $_GET['date'];
        redirectToTaskHome();
      } 
   }
    elseif ($_GET['action']==-1) {

    $isTaskDeleted =  deleteTask($_GET['ID']);
    if($isTaskDeleted == 'deleted'){
        redirectToTaskHome();
    }
    }

    else if ($_GET['action']==2) {
      $taskIdList = explode(',',$_POST['deleteId']);

      for($i = 0; $i<count($taskIdList); $i++) {
        deleteTask($taskIdList[$i]);
       }
        redirectToTaskHome();
    }

     else if ($_GET['action']==3) {
      $donetaskIdList = explode(',',$_POST['doneId']);
      echo var_dump($donetaskIdList);

      for($i = 0; $i<count($donetaskIdList); $i++) {
         completedTaskAll($donetaskIdList[$i]);
       }
        redirectToTaskHome();
    }

}

?>