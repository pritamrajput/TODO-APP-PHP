
<?php
   include "config.php";

// function to get data from the database
   function getData($dates,$con){
       $sql = "select * from tbltodo WHERE date = '$dates'";
       $data = mysqli_query($con, $sql);
       return $data;
   } 
 

// function to insert the data
    function insertDataToList($data,$date){
        while ($row = mysqli_fetch_array($data)) {
           $checkListStyle = $row['done'] ? 'text-decoration: line-through;' : 'text-decoration: none;';
            $checkedBtnName = $row['done'] ? 'Undo':'Done';
            echo '<tr><td>
                    <div style="'.$checkListStyle.'">'.$row['list'].'</div>
                    <div style="font-size: 10px;color: #899499;">'.$date.'</div>
                    </td>
                    <td style="width:10%;"><a href="done.php?ID='.$row['id'].'&date='.$date.'&check='.$row['done'].'"  class="btn btn-outline-success">'.$checkedBtnName.'</a></td>
                    <td style="width:10%;"><a href="delete.php?ID='.$row['id'].'&date='.$date.'"  class="btn btn-outline-danger" id="delete-btn">Delete</a>
                  </td></tr>';
          }
    }

//function to choose the date and data for inserting to the list
    function choosenDateAndData($data, $date){
      if(mysqli_num_rows($data) > 0){
           insertDataToList($data,$date);
         }
      else{
        echo "<div class=\"text-center\">";
        echo "No task list found";
        echo  "</div>";
      }
    }
  
    
//condition for getting date and data according to the filter value
    if(isset($_GET['date'])){
       $choosendate =  $_GET['date'];
       $choosenDateData = getData($choosendate,$con);
       choosenDateAndData($choosenDateData, $choosendate);
    }

    else{
       $currentdate = date('Y-m-d');
       $todayDateData = getData($currentdate,$con);
       choosenDateAndData($todayDateData, $currentdate);
    }
             
?>         