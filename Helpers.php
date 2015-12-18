<?php

	function dump($dataToDump)
	{
		print "<p> Data Dump: </p>";
		print "<pre>" . print_r($dataToDump,true)."</pre>";
		print "<p> EOD </p>";
	}
	function printBR($data)
	{
		print  $data ."<br />";
	}	
	function printP($data)
	{
		print  "<p>" . $data ."</p>";
	}
	function urlExists($url)
	{
		//http://stackoverflow.com/questions/2280394/how-can-i-check-if-a-url-exists-via-php
		
		$file_headers = @get_headers($url);
		if(($file_headers[0] == 'HTTP/1.1 404 Not Found') or ($file_headers[0] == 'HTTP/1.0 400 Bad Request'))
		{
    	return (FALSE);
		}
		else 
		{
		    return(TRUE);
		}

	}
?>