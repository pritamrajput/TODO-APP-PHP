<?php
include "config.php";
$searchedTask = $_GET['search'];
$sql = "select * from tbltodo WHERE CONCAT(list) LIKE '%$searchedTask%'";
$searchedTask = mysqli_query($con, $sql);
$searchedTaskArray = [];

if (mysqli_num_rows($searchedTask) > 0) {
    foreach ($searchedTask as $task) {
        array_push($searchedTaskArray, $task);
    }
    header('Content-type: applicaiton/json');
    echo json_encode($searchedTaskArray);
}

?>