<?php
/*
- finds all students on rubric
- finds all that have already been marked
- takes graded ones away from the list
- returns all ungraded to rubric as JSON data

*/
function __autoload($class_name) {
    require_once "classes/class.".$class_name . '.php';
}
$db = new coreapp;
$all_students = $db->select("select students.firstname, students.surname, students.id as student_id from 
students inner join rubric_student on students.id = rubric_student.student_id 
inner join rubrics on rubric_student.rubric_id = rubrics.id
where rubrics.id = ".$_GET['rubric']." order by students.surname ASC");
$already_marked = $db->select("select students.firstname, students.surname, rubric_scores.student_id from rubric_scores 
inner join students on rubric_scores.student_id = students.id
where rubric_scores.rubric_id = ".$_GET['rubric']);
if (!empty($already_marked)){
	$students = array_values(array_diff_assoc($all_students,$already_marked));
} else {
	$students = $all_students;
}
echo json_encode($students);
?>