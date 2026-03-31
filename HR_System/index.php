<?php
include_once 'db-inc.php';
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <meta charset="utf-8">
  <title>Joe's Coaches</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="nav-wrapper">     <nav>
<ul class="nav-list">
<img id="icon" src="img/default.png" alt="">
<li class="nav-item"><a href="index.html">Account</a></li> <li><a href="#">Logout</a></li>
</ul>
    </nav>
  </div>
  <div class="employees">
    <h2>Employees</h2>
    <div class="employee-list">




<?php


$sqlStatement = 'select employees.firstName, employees.lastName,
employees.jobTitle,departments.departmentName,employees.email,employees.salary from employees join departments on employees.departmentCode = departments.departmentCode;';
$queryResult = mysqli_query($dbConnection,$sqlStatement);
$resultCheck = mysqli_num_rows($queryResult);

$currency = "£";

if($resultCheck>0){
  while($row=mysqli_fetch_assoc($queryResult)){
      echo "<li>
      <div class='employee-card'>
      <img class='user-img' src='img/default.png' alt=''>
<span>
  <div class='employment-details'>

    <span class='name-format'>".$row['firstName']."</span>
    <span class='name-format'>".$row['lastName']."</span>
    <br>
    <span>".$row['jobTitle']."</span>
    <br>
    <span>".$row['departmentName']."</span>
    <br>
    <span>".$row['email']."</span>
    <br>
    <span>".$currency.$row['salary']."</span>

  </div>
</span>
</div>

</li>";
}
}




 ?>

</div>

</div>
  <div class="interviews">
    <h2>Upcoming Interviews</h2>
    <?php
    $sql = "SELECT * FROM interviews";
    $result = mysqli_query($dbConnection, $sql);

    while($row = mysqli_fetch_assoc($result)){
      echo "<li>
      <div class='list-item'>
        <h3>".$row['departmentCode']."</h3>
        <br>
        <p>".$row['role']."</p>
        <br>

        <button onclick=\"location.href='updateStatus.php?id=".$row['id']."&status=Accepted'\">Accept</button>

        <button onclick=\"location.href='updateStatus.php?id=".$row['id']."&status=Rejected'\">Reject</button>

        <p>Status: ".$row['status']."</p>

      </div>
      </li>";
    }
    ?>
    </div>
    <!-- MODAL -->
  <div id="employeeModal" class="modal">
    <div class="modal-content">
<header class="modal-header">
<div class="modal-header-content">
<span>Add employee</span>
</div>
</header>
<div class="modal-container">
<form class="" action="submit.php" method="POST">
<div>
  <label for="empnum">Employee Number</label>
  <input type="text" name="employee-number" id="name">
  <br>
</div>
<div>
  <label for="fname">First Name</label>
  <input type="text" id="name" name="first-name">
  <br>
</div>
<div>
  <label for="fname">Last Name</label>
  <input id="surname" type="text" name="last-name">
  <br>
</div>
<div>
  <label for="fname">Position</label>
  <input id="position" type="text" name="position">
  <br>
</div>
<div>
  <label for="fname">Department</label>
  <input id="department" type="text" name="department">
  <br>
</div>
<div>
  <label for="fname">Email</label>
  <input id="email" type="text" name="email">
  <br>
</div>
<div>
  <label for="fname">Salary</label>
  <input id="salary" type="text" name="salary">
  <br>
</div>
  <button id="confirmBtn" type="submit" name="button" onclick="addEmployee()">Confirm</button>


</form>
</div>
<footer class="modal-footer">
</footer>
    </div>
  </div>
  <!-- MODAL -->
<div id="interviewModal" class="modal">
  <div class="modal-content">
    <header class="modal-header">
<div class="modal-header-content">
<span>Add interview</span>
</div>
    </header>
    <div class="modal-container">
      <form action="addInterview.php" method="POST">
<div>
      <label>Department</label>
      <input type="text" name="department">
    </div>
    <div>

      <label>Position</label>
      <input type="text" name="position">
    </div>

      <button id="confirmIntBtn" type="submit">Confirm</button>

      </form>
    </div>
    <footer class="modal-footer">
    </footer>
  </div>
</div>
  <button class="btn" type="button" name="button" onclick="showAddIntModal()">Add Interview</button>
  <button class="btn" type="button" name="button" onclick="showAddEmpModal()">Add Employee</button>
<script type="text/javascript" src="main.js">
</script>
</body>
</html>
