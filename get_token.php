<?php
	require_once "Configuration.php";
	$config = Configuration::Instance();

	$url = "https://accounts.google.com/o/oauth2/auth";

  $params = array(
    "response_type" => "code",
    "client_id" => $config->Get('OAuth2ClientID'),
    "redirect_uri" => "http://localhost/" . $config->get('webroot') . "oauth2callback.php",
    "scope" => "https://www.google.com/calendar/feeds/"
  );

  $request_url = $url . "?". http_build_query($params);
  header("Location: ".$request_url);

 ?>
