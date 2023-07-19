<?php
    include "getdata.inc.php";
 
    // function to get the task list as per the date entered
    function getList($row1, $date){
      $checkListStyle = $row1['done'] ? 'text-decoration: line-through;' : 'text-decoration: none;';
      $checkedBtnName = $row1['done'] ? 'Undo':'Done';
      $td = '<td>
        <div style="'.$checkListStyle.'">'.$row1['list'].'</div>
        <div style="font-size: 10px;color: #899499;">'.$date.'</div>
      </td>
      <td style="width:10%;"><a href="done.php?ID='.$row1['id'].'&date='.$date.'&check='.$row1['done'].'" class="btn btn-outline-success">'.$checkedBtnName.'</a></td>
      <td style="width:10%;"><a href="delete.php?ID='.$row1['id'].'&date='.$date.'" class="btn btn-outline-danger">Delete</a></td>';

      return $td;
    }


    if(isset($_GET['date'])){
       

        if(mysqli_num_rows($choosenDateData) > 0){
              while ($row1 = mysqli_fetch_array($choosenDateData)) {
?>
            <tr>
                  <?php echo getList($row1, $choosendate) ;?>
            </tr>
<?php
               }
              }
        else{
?>
          </tbody>
          <tbody>
            <div class="text-center">
                <?php echo "No task list found"; ?>
            </div>
<?php
             } }
           else {
            while ($row = mysqli_fetch_array($todayDateData)) {     
?>
              <tr>
               <?php echo getList($row,$currentdate)?>
             </tr>
<?php
               }
            }
?> 