## WebLab 2015 OAuthentication Exercise ##

Access my google calendar(s) through the google API

### Flow ###
index.php 
-> getToken  (get user authentication token from google)
-> oauthCallBack (come here when google responds with token)

### Requirements ###
1. You may need an ssl certificate, which this site explains: http://snippets.webaware.com.au/howto/stop-turning-off-curlopt_ssl_verifypeer-and-fix-your-php-config/

1. The Configuration class reads a config file which is housed outside of webroot. It must be specified within the class and must contain:
	* webroot 
	* OAuth2ClientID
	* OAuth2ClientSecret


