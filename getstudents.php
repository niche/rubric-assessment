<?php
function __autoload($class_name) {
    require_once "classes/class.".$class_name . '.php';
}
$db = new coreapp;
$students = $db->select("select students.firstname, students.surname, students.id from 
students inner join rubric_student on students.id = rubric_student.student_id 
inner join rubrics on rubric_student.rubric_id = rubrics.id
where rubrics.id = ".$_GET['rubric']." order by students.surname ASC");
echo json_encode($students);
?>