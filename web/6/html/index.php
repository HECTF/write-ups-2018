<?php 
	include 'flag.php';
    highlight_file(__FILE__); 
    error_reporting(0); 
    echo preg_replace("/123(.+?)123/ies", 'text("\\1")', $_POST['h']);
	function text($str)
	{
		echo '123';
	}
?>