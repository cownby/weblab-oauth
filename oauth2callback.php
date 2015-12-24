<?php
	require "Configuration.php";
	$config = Configuration::Instance();
	
	$callback = $config->get('webhost') . $config->get('webroot') . "oauth2callback.php";

if(isset($_GET['code'])){

  $code = $_GET['code'];
  //printP( "_GET[code]: " .$code);

  $params = array(
      "code" => $code,
      "client_id" => $config->Get('OAuth2ClientID'),
      "client_secret" => $config->Get('OAuth2ClientSecret'),
      "redirect_uri" => $callback,
      "grant_type" => "authorization_code"
  );


  // Get cURL resource
  $curl = curl_init();
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => 'https://accounts.google.com/o/oauth2/token',
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $params
  ));
  //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
	
	if ($resp == FALSE) 
	{
		print "curl response was false <br />";
		print "<pre>".print_r(curl_error($curl))."</pre>";
	}
	
	//print "<br />curl response, just to see: <br />";
  //print "<pre>".print_r(json_decode($resp), true)."</pre>";
  
  // Close request to clear up some resources
  curl_close($curl);
  $r = json_decode($resp);
  $token = $r->access_token;


  $url ='https://www.googleapis.com/calendar/v3/users/me/calendarList?access_token='.$token;

  $ch = curl_init();

  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false);

  $output=curl_exec($ch);
  //printP('html special chars ' .htmlspecialchars($output));
  curl_close($ch);
	if ($output == FALSE) 
	{
		print "curl response was false for " .$url ."<br />";
		print "<pre>".print_r(curl_error($ch))."</pre>";
	}
	

  print "<br/><br/>";
  $obj = json_decode($output);
	printBR('decoded curl output:');
	dump($obj);










}
