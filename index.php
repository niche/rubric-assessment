<?php
$db = new coreapp;
$db->authenticate();
function __autoload($class_name) {
    require_once "classes/class.".$class_name . '.php';
}
$rubrics = $db->select("select rubrics.name, rubrics.id from rubrics where first_marker_id = 'smusim'");
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
<body>
<h1>My Rubrics</h1>
<?php
foreach($rubrics as $rubric){
	echo "<p><a href='rubric.php?rubric=".$rubric['id']."'>".$rubric['name']."</a></p>";
}
?>
</body>
</html>