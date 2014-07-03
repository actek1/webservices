<?php
require_once("oauth/twitteroauth.php");

//Password y Username recibidos del formulario
$data = json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->uname);
$upswd = mysql_real_escape_string($data->pswd);

//cuenta y numero de Tweets
$twitter_user = "CNN";
$num_tweets = 9;
//keys de Twitter
$consumerkey = "rwpLfyqai1O7WUrctJuPWBH6s";
$consumersecret = "eCPefJW6djpN920OqagYuelXcu9gg416DJTkCR8qZoLAHFKYHW";
$accesstoken = "217753517-Yj3pbM1ToUByUBxAly79NAJyAXBzwAMa7vRbF8Of";
$accesstokensecret = "Gi01QDL3Q44Kx551ZBpnESsxCGASZs8p0nzmB5JyCs0Qt";
 
//conexion a TwitterOAuth mandando como parametros los keys
$conectar = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
//enlace con la respuesta en JSON de twitter con los Twetts solicitados
$tweets = $conectar->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_user."&count=".$num_tweets);
//respuesta de regreso al angular en JSON
header('Content-type: application/json');
print json_encode($tweets);
?>