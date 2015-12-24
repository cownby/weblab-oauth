## WebLab 2015 OAuth Exercise ##
(Open standard for Authorization)

Access google calendar(s) through the google API. It simply dumps the data to verify the calendar was accessed.

### Flow ###
index.php 
-> getToken  (get user authentication token from google)
-> oauthCallBack (come here when google responds with token)

### Requirements ###
1. You may need an ssl certificate, which this site explains: http://snippets.webaware.com.au/howto/stop-turning-off-curlopt_ssl_verifypeer-and-fix-your-php-config/

1. The Configuration class reads a config file which is housed outside of webroot. It must be specified within the class and must contain:
	* webhost (ex: http://localhost:8080/)
	* webroot (ex: WebLab/APImodule/oauthExercise/)
	* OAuth2ClientID
	* OAuth2ClientSecret


## Development Steps ##
1. goto https://console.developers.google.com to setup credentials. You must specify the EXACT redirect URL, which in this case is oauth2callback.php.
1. 

## References ##
https://developers.google.com/identity/protocols/OAuth2
https://developers.google.com/api-client-library/php/auth/web-app
