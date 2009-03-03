<?php
function __autoload($class_name) {
    require_once "classes/class.".$class_name . '.php';
}
session_start();
$score = new score;
$score->criterias = $_POST['criteria'];
$score->student_id = $_POST['rubric']['student_id'];
$score->comments = $_POST['rubric']['comments'];
$score->rubric_id = $_POST['rubric']['rubric_id'];
$score->marker_id = $_SESSION['user']['userID'];
$score->type = "first";//ability to be first, second or self marking - functionality currently disabled.
$score->saveScores();
?>