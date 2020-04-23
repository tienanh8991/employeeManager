<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDay = $_POST['birthDay'];
$address = $_POST['address'];
$jobPosition = $_POST['jobPosition'];
$group = $_POST['group'];
include '../class/Employee.php';
include '../class/EmployeeManager.php';
$employee = new Employee();
$employeeManager = new EmployeeManager('../data.json');

$employee->setFirstName($firstName);
$employee->setLastName($lastName);
$employee->setBirthDay($birthDay);
$employee->setAddress($address);
$employee->setJobPosition($jobPosition);
$employee->setGroup($group);
$employeeManager->setDataEmployee($employee);
header('Location: ../index.php');