<?php 
  $error = " ";
  $db = mysqli_connect("localhost", "root", "", "todo");
 
  if (isset($_POST['addTaskBtn'])) {
      $task = $_POST['task'];
      $completed = $_POST['taskStatus'];
      $dueDate = $_POST['dueDate'];
      
      $sql = "INSERT INTO tasks (task, completed, dueDate) VALUES ('$task', '$completed',  '$dueDate')";
      mysqli_query($db, $sql);
      header('location: index.php');
     
  } 
  // delete task
if (isset($_GET['deleteTaskButton'])) {
  $id = $_GET['deleteTaskButton'];

  mysqli_query($db, "DELETE FROM tasks WHERE id= '$id'");
  header('location: index.php');
}


?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src = "js/filter.js"> </script>


 
    <title>To-Do List App</title>
  </head>
  <body>
   <table id = 'taskTable'>

  <thead>
    <tr> <h3 class = "title"> To-Do List Application </h3></tr>
    <tr>
      <th>Tasks</th>
      <th> Status </th>
      <th> Due Date </th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <tr>
 <form method ="post" action = "index.php" class = "input_form">
    <td> <input type="text" name="task" class="task_input" placeholder ="Enter a Task" required> </td>
    <td> <select name="taskStatus" required>
  <option value="Pending" selected>Pending</option>
  <option value="Started">Started</option>
  <option value="Completed">Completed</option>
  <option value="Late">Late</option>
</select></td>
    <td> <input type = "date" name = "dueDate" required> </td>
    <td> <button type="addTaskBtn" name="addTaskBtn" id="add_btn" class="add_btn"> + </button></td>
  </form>
  </tr>
    <?php 
    $tasks = mysqli_query($db, "SELECT * FROM tasks");

    $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
      <tr>
        <td class="task"> <?php echo $row['task']; ?> </td>
        <td class = "completed"> <?php echo $row['completed']?> </td>
        <td> <?php echo $row['dueDate']?></td>
        <td class="delete"> 
          <a href="index.php?deleteTaskButton=<?php echo $row['id'] ?>">x</a>
        </td>
      </tr>
    <?php $i++; } ?>  
  </tbody>
</table>
<div class = "filters">
<button class = "pendingFilter"> Pending Tasks:  <?php $pending = mysqli_query($db, "select count(id) from tasks where completed = 'Pending'"); $pendingString = $pending->fetch_row()[0]; echo $pendingString;  ?> </button>
<button class = "lateFilter"> Late Tasks: <?php $late = mysqli_query($db, "select count(id) from tasks where completed = 'Late'"); $lateString = $late->fetch_row()[0]; echo $lateString; ?> </button>
<button class = "startedFilter"> Started Tasks:  <?php $started = mysqli_query($db, "select count(id) from tasks where completed = 'Started'"); $startedString = $started->fetch_row()[0]; echo $startedString;  ?> </button>
<button class = "completedFilter"> Completed Tasks: <?php $completed = mysqli_query($db, "select count(id) from tasks where completed = 'Completed'"); $completedString = $completed->fetch_row()[0]; echo $completedString;?>  </button>
<button class = "showAllFilter"> Show All Tasks:  <?php $total = mysqli_query($db, "select count(id) from tasks"); $totalString = $total->fetch_row()[0]; echo $totalString;?> </button>
</div>
</body>
</html>