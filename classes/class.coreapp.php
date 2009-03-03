<?php
class coreapp {
	var $db_server = "localhost";
	var $db_user = "root";
	var $db_password = "cs1xn5";
	var $db_name = "rubricapp";

	function authenticate() {
		error_reporting(0);//stops it from sending errors about not being able to bind when invalid username/password entered.
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			//this sets username and password to an invalid setting so that it doesn't bind anonomously
			$user = "nothing";
			$pass = "nothing";
		} else {
			$user = $_SERVER['PHP_AUTH_USER'];
			$pass = $_SERVER['PHP_AUTH_PW'];
		}
		$ldap = ldap_connect('ad.hud.ac.uk');
						if(!$ldap) {
							print "<br>connection error";
							exit();
						}
		$ad_validate = ldap_bind($ldap,$user.'@ad.hud.ac.uk',$pass);//check if AD credentials are correct
		$this->db_connect();
		$registered_user = mysql_query("SELECT userID, dept, accesslevel FROM users WHERE userID = '".$user."'");
		$app_validate = mysql_num_rows($registered_user);//check if user is registered with the system
		if (!$ad_validate || !$app_validate) {
		  header('WWW-Authenticate: Basic realm="ILP"');
		  header('HTTP/1.0 401 Unauthorized');
		  die ("Not authorized, contact <a href='mailto:i.mcnaught@hud.ac.uk'>Ian McNaught</a> for access");
		  exit;
		} 
		$user=mysql_fetch_assoc($registered_user);
		session_start();
		$_SESSION['user'] = $user;
	}
	
	function debug($variable){
		print "<pre>";
		print_r($variable);
		print "</pre>";
	}
	
	function sql_safe( $value )
	{
		if( get_magic_quotes_gpc() )
		{
			  $value = stripslashes( $value );
		}
		//check if this function exists
		if( function_exists( "mysql_real_escape_string" ) )
		{
			  $value = mysql_real_escape_string( $value );
		}
		//for PHP version < 4.3.0 use addslashes
		else
		{
			  $value = addslashes( $value );
		}
		return $value;
	}
	
	function select($query){
		$this->db_connect();
		if ($querystatus=mysql_query($query)){
		}else{
			echo("Query <b>$query</b> unsuccessful");
			echo(mysql_errno());
			echo(" : ");
			echo(mysql_error());
			echo("<br><br>");
		}
		$x = 0;	
		if (mysql_num_rows($querystatus) != 0){
			while ($responserow=mysql_fetch_assoc($querystatus)){
				$result_array[$x] = $responserow;
				$x++;		
			}
		}
		if (isset($result_array)) {
			return $result_array;
		} else {
			return false;
		}
	}

	function updateinsert($query){
		$this->db_connect();
		if ($querystatus=mysql_query($query)){
			return true;
		}else{
			echo("Query <b>$query</b> unsuccessful");
			echo(mysql_errno());
			echo(" : ");
			echo(mysql_error());
			echo("<br><br>");
		}
	}
		

	function db_connect () {
		$link=mysql_connect($this->db_server,$this->db_user,$this->db_password);
		mysql_query("use ".$this->db_name);
	}	
}
?>