<?php
include_once 'db-inc.php';

$department = $_POST["department"];
$position = $_POST["position"];

$sqlStatement = "INSERT INTO interviews (departmentCode, role)
VALUES ('$department', '$position');";

mysqli_query($dbConnection,$sqlStatement);

header("Location:index.php?submission=success");
?>
