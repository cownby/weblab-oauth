<?php

	// This is the token controller which gets user authentication token from google
	
	//read the configuration file as specified in this class.
	//I've since learned that singletons make no sense in a stateless php environment,
	//  but it was a good exercise.
	require_once "Configuration.php";
	$config = Configuration::Instance();

	$url = "https://accounts.google.com/o/oauth2/auth";

  $params = array(
    "response_type" => "code",
    "client_id" => $config->Get('OAuth2ClientID'),
    "redirect_uri" => $config->Get('webhost') . $config->get('webroot') . "oauth2callback.php",
    "scope" => "https://www.google.com/calendar/feeds/"
  );
	try
	{

	  $request_url = $url . "?". http_build_query($params);
	  if (urlExists($request_url))
	  {
		  	header("Location: ".$request_url);		
		}
		else 
		{
			throw new Exception("Can't find url. Is localhost set properly in config file? ".$request_url);
		}
	}
	catch (Exception $e)
	{
		error_log( $e->getMessage(), 0);
		header("Location: ".$request_url);
	}
 ?>
