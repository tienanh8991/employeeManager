<?php
include '../class/EmployeeManager.php';
$index = $_REQUEST['index'];
$employeeManager = new EmployeeManager('../data.json');
$dataArray = $employeeManager->getDataEmployee();
unlink('../upload/'.$dataArray[$index]->avatar);
$employeeManager->delete($index);
header('Location: ../index.php');