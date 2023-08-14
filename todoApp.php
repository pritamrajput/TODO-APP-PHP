<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>

     <!-- Bootstrap included -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-primary">

<!-- Task submitting form -->
<form action="/ToDoAPP/taskUpdate.php?action=1" method = "POST">
    <div class="container">
        <div class="row justify-content-center bg-white m-auto shadow mt-3 py-3 col-md-6">
            <h3 class="text-center text-primary font-monospace">TODO LIST</h3>
            <div class="col-8">
                <input type="text" name="list" class="form-control" required>
            </div>
            <div class="col-2">
                <button class="btn btn-outline-primary">ADD</button>
            </div>
      
        </div>
        
    </div>
</form>


<!-- Task list container -->
<div class="container">
    <div class="col-8 bg-white m-auto mt-3">

      <form action="todoApp.php" method="GET" class="d-flex justify-content-center align-items-end p-3">
        <div class = "px-2">
            <label>Pick a date</label>
            <input type="date" name="date" value ="<?php if(isset($_GET['date'])) {echo $_GET['date'];} else{echo date('Y-m-d');}?>" id="date" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
<div class="all-buttons">
      <form class="delete-all-form" action="taskUpdate.php?action=2&date=<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>" method='POST'> 
        <input type="hidden" id="custId" name="deleteId" value="">
        <button type="submit" class="btn btn-outline-danger delete-all mx-2">Delete all</button>
      </form>
       <form class="done-all-form" action="taskUpdate.php?action=3&date=<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>"  method='POST'> 
        <input type="hidden" id="donecustId" name="doneId" value="">
        <button type="submit" class="btn btn-outline-danger done-all mx-2">Check all</button>
      </form>
</div>
 <nav class="navbar navbar-light bg-light">
         <form action="todoApp.php" class="form-inline" method='GET'>
         <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search your task">
         <button class="btn btn-primary my-sm-0" type="submit">Search</button>
        </form>
</nav>



        <table class="table">
            <tbody>
                <?php
                    include "tasklist.inc.php";
                ?>
            </tbody>
        </table>
    
    </div>
</div>


 <!-- js script -->
 <script type="text/javascript" src="script/script.js"></script>
</body>
</html>