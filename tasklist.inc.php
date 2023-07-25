<?php

   include "config.php";

// function to get tasks from the database
   function getTasks($dates,$con){
       $sql = "select * from tbltodo WHERE date = '$dates'";
       $data = mysqli_query($con, $sql);
       return $data;
   } 
 


//function to show task list
   function showTaskList($data, $date){
      if(mysqli_num_rows($data) > 0){
           while ($row = mysqli_fetch_array($data)){
             $checkListStyle = $row['done'] ? 'text-decoration: line-through;' : 'text-decoration: none;';
             $checkedBtnName = $row['done'] ? 'Undo':'Done';
            echo '<tr><td>
                    <div style="'.$checkListStyle.'">'.$row['list'].'</div>
                    <div style="font-size: 10px;color: #899499;">'.$date.'</div>
                    </td>
                    <td style="width:10%;"><form action="taskUpdate.php?ID='.$row['id'].'&date='.$date.'&check='.$row['done'].'&action=0" method="post"><input type="submit" value='.$checkedBtnName.' class="btn btn-outline-success"></form></td>
                    <td style="width:10%;"><form action="taskUpdate.php?ID='.$row['id'].'&date='.$date.'&action=-1" method="post"><input type="submit" value="Delete" class="btn btn-outline-danger" id="delete-btn"></form>
                  </td></tr>';
            }
         }
      else{
        echo "<div class=\"text-center\">";
        echo "No task list found";
        echo  "</div>";
   }
}
  
  
     $date = isset($_GET['date']) ?  $_GET['date'] :  date('Y-m-d');
     $taskList = getTasks($date,$con);
     showTaskList($taskList, $date);
            
?>         