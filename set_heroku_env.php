<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

print_r($_ENV);

echo "--------------------------------------------------------------------------------\n";
echo "\n";
echo "Above .env variable are shown for reference, it will not be pushed to heroku\n";
echo "\n";
echo "--------------------------------------------------------------------------------\n";
echo "\n";

$info = `heroku info`;
echo $info;

//$infoarr = preg_split("/\r\n|\n|\r/", $info);
//print_r($infoarr);

preg_match('/Web URL:/', $info, $matches, PREG_OFFSET_CAPTURE);
//var_dump($matches);
$WEBURL = trim(substr($info, $matches[0][1] + 8));

// remove https:// and last /
//$WEBURL = preg_replace( "#^[^:/.]*[:/]+#i", "", $WEBURL);

$WEBURL = rtrim($WEBURL,"/");
//echo "'".$WEBURL."'";

$DATABASE_URL = `heroku config:get DATABASE_URL`;
echo $DATABASE_URL;

$dbopts = parse_url($DATABASE_URL);
print_r($dbopts);

$output = `heroku config:set APP_NAME=namesome`;
$output = `heroku config:set APP_ENV=production`;
$output = `heroku config:set APP_KEY=base64:wmlr/xWqHg5m+56oHbSwU3eCWp+Pgll+Bx/hFBdC3Gw=`;
$output = `heroku config:set APP_DEBUG=false`;
$output = `heroku config:set APP_URL=$WEBURL`;
$output = `heroku config:set APP_TIMEZONE=Asia/Bangkok`;
$output = `heroku config:set LOG_CHANNEL=stack`;
$output = `heroku config:set LOG_SLACK_WEBHOOK_URL=`;
$output = `heroku config:set DB_CONNECTION=pgsql`;
$host = $dbopts['host'];
$port = $dbopts['port'];
$db = substr($dbopts['path'], 1, -1);
$user = $dbopts['user'];
$pass = $dbopts['pass'];
$output = `heroku config:set DB_HOST=$host`;
$output = `heroku config:set DB_PORT=$port`;
$output = `heroku config:set DB_DATABASE=$db`;
$output = `heroku config:set DB_USERNAME=$user`;
$output = `heroku config:set DB_PASSWORD=$pass`;
$output = `heroku config:set CACHE_DRIVER=file`;
$output = `heroku config:set QUEUE_CONNECTION=sync`;


?>

