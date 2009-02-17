<?php
class processtext {

function __construct($delimiter, $filename){
$this->delimiter = $delimiter;
$this->filename = $filename;
}

function debug($var){
	print "<pre>";
	print_r($var);
	print "</pre>";
}

function text2array(){
	$fh = fopen($this->filename, 'r');
	$textData = fread($fh, filesize($this->filename));
	fclose($fh);
	$textData = explode("\n",$textData);
	if ($delimiter!=''){
		foreach($textData as $linekey => $line){
			$textData[$linekey] = explode($this->delimiter,$line);
		}
	}
	return $textData;
}
}
?>