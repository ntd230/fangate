<?php
require('./fb/facebook.php');

if (file_exists('./config.php'))
{
	require('./config.php');
}
else
{
	die("No configuration found.");
}

$fb = new Facebook(array(
	'appId' => FB_APP_ID,
	'secret' => FB_APP_SECRET
));
	
$data = $fb->getSignedRequest();

if ($data['page']['liked'])
{
	$tab_content = './tpl/like.html';
}
else
{
	$tab_content = './tpl/nolike.html';
}

require($tab_content);
