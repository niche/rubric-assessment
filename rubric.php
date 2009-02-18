<?php
$db = new coreapp;
//$db->authenticate();
//$db->debug($_SESSION);
function __autoload($class_name) {
    require_once "classes/class.".$class_name . '.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rubric Self Assessment</title>
<style type="text/css">
  #feedback { font-size: 1.4em; }
  #selectable .ui-selecting { background: #FECA40; }
  .selected { background: #F39814; color: white; }
  .over {border: 1px solid #F39814}
  #selectable { list-style-type: none; margin: 0; padding: 0; }
  #selectable li { margin: 3px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 4em; text-align: center; }
</style>
<link rel="stylesheet" type="text/css" href="css/rubric.css" />
<link rel="stylesheet" type="text/css" href="theme/ui.theme.css" />
<link rel="stylesheet" type="text/css" href="theme/ui.core.css" />
<link rel="stylesheet" type="text/css" href="theme/ui.buttons.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ui.core.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/rubric.js"></script>
</head>

<body>
<?php
$rubric = $db->select("select rubrics.name, rubrics.id from rubrics
where rubrics.id = ".$_GET['rubric']);
$criterias = $db->select("select criterias.id, criterias.description, criterias.fail, criterias.third, criterias.twotwo, criterias.twoone, criterias.first
from criterias  
where criterias.rubric_id = ".$_GET['rubric']);
//$db->debug($rubric);
?>
<h1><?php echo $rubric[0]['name']?></h1>
<h2 id="studentname"></h2>
<span id="count" style="position: absolute; top: 0; right: 4px; font-size: 3em; font-weight: bold;"></span>
<form id="rubric_form" name="score" method="post" action="submitrubric.php">
<button id="rubricsubmit" class="fg-button ui-state-disabled ui-corner-all" disabled>Submit</button>
<table width="100%" id="rubric">
  <tr>
    <td style="border-width: 0 1px 1px 0; background: 0" class="header"></td>
    <td class="header range"><p>Fail</p></td>
    <td class="header range"><p>3rd</p></td>
    <td class="header range"><p>2.2</p></td>
    <td class="header range"><p>2.1</p></td>
    <td class="header range"><p>1st</p></td>
  </tr>
  <?php
  $x = 0;
  foreach ($criterias as $row) {
	echo "<tr id='selectable'>";
	echo "<td class='header'>".$row['description']."</td>";
	echo "<td class='criteria".$row['id']."' id='1'>".$row['fail']."</td>";
	echo "<td class='criteria".$row['id']."' id='2'>".$row['third']."</td>";
	echo "<td class='criteria".$row['id']."' id='3'>".$row['twotwo']."</td>";
	echo "<td class='criteria".$row['id']."' id='4'>".$row['twoone']."</td>";
	echo "<td class='criteria".$row['id']."' id='5'>".$row['first']."<input class='score' type='hidden' id='criteria".$row['id']."' name='criteria[".$row['id']."]'></td>";
	echo "<tr>";
	$x++;
  }
  ?>
</table>
<input type='hidden' id='rubric_id' name='rubric[rubric_id]' value='<?php echo $_GET["rubric"]?>'>
<input class='score' type='hidden' id='student_id' name='rubric[student_id]'>
<label>Comments:</label>
<textarea id="comments" name="rubric[comments]" class="ui-state-default" style="background:white; color: black" width: "100%"></textarea>
</form>
</body>
</html>
