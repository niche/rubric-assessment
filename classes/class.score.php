<?php
class score extends coreapp {
	public $criterias;
	public $student_id;
	public $marker_id;
	public $type;
	public $comments;
	public $rubric_id;
	
function saveScores() {
	$this->db_connect();
/*	$thisone = "SELECT id from rubric_scores where rubric_id = ".$this->rubric." and student_id = ".$this->student_id." and marker_id = ".$_SESSION['user'];
	if ($this->select($thisone)){
	
	}*/
	/*if ($this->select("SELECT id from criteria_scores where id = ".$this->id)){
		$query = "update scores set
		criteria_id = '".$this->criteria_id."',
		student_id = '".$this->student_id."',
		score = '".$this->score."',
		marker = '".$this->marker."',
		type = '".$this->type."',
		comments= '".$this->comments."'
		where scores.id = ".$this->id;
		if ($this->updateinsert($this->sqlsafe($query))){
			return true;
		}
	} else {*/
	$rubric_score = "INSERT INTO rubric_scores (comment, rubric_id, student_id, marker_id, type) values ('$this->comments', '$this->rubric_id', '$this->student_id', '$this->marker_id', '$this->type')";
	$this->updateinsert($rubric_score);
	$rubric_score_id = mysql_insert_id();
	foreach($this->criterias as $key => $score){
		$criteria_score = "insert into criteria_scores (criteria_id, rubric_scores_id, score) values ('$key','$rubric_score_id','$score')";
		$this->updateinsert($criteria_score);
	}
	/*}*/
}
	
}
?>