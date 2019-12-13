<?php
include_once "../../class/DataInterface.php";
include_once "../../class/Database.php";
include_once "../../class/Student.php";
include_once "../../class/StudentManager.php";
include_once "../../class/GroupManager.php";
$nameGroup = $_GET['group-name'];
$dataGroupPath = "../../group.json";
$dataStudentPath = "../../data.json";
$studentManager = new \Controller\StudentManager($dataStudentPath);
$groupManager = new \Controller\GroupManager($dataGroupPath, $studentManager);
$students = $groupManager->getStudentsIntoGroup($nameGroup);
var_dump($students);
?>