<?php
require_once('classes/connection.php');

debug($_POST);
$user_id = $db->insert_array('users', $_POST);
if (!$user_id) $db->print_last_error(false);
$db->print_last_query();
?>