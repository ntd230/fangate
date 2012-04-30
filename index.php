<?php
require('./fb/facebook.php');
require('./config.php');

$fb = new Facebook(array(
	'appId' => FB_APP_ID,
	'secret' => FB_APP_SECRET
));
	
$data = $fb->getSignedRequest();

if ($data['page']['liked'])
{
	$tab_content = './like.html';
}
else
{
	$tab_content = './nolike.html';
}

require($tab_content);
