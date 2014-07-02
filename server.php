<?php
require_once("oauth/twitteroauth.php"); //Path to twitteroauth library

//Password y Username recibidos
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);

//Procesamiento de Twitts
$twitteruser = "FutApp";//Username
$notweets = 5;//number of tweets to get
$consumerkey = "LHkKJItKmJGj9EewF2543SQoY";
$consumersecret = "cVImsvPmHZxrLte2JgCtUqx1JgNJApMvd4RzS99UgFVRB0V4C8";
$accesstoken = "379872175-t4gLqlkgZ5wdP5d3A3AujfRwc8ZMU7Oq3yn9ptZ5";
$accesstokensecret = "SR7GqQOoBJWVS6qmHMIU8iDCjwylgAHHvDVlHWIZ9leno";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
print json_encode($tweets);
?>