<?php
if (file_exists('./config.php'))
{
	require('./config.php');
}

if (defined('FB_APP_ID') && defined('FB_APP_SECRET'))
{
	$opts = array(
		'app_id' => FB_APP_ID,
		'app_secret' => FB_APP_SECRET
	);
}
else
{
	$opts = array();
}
?><!DOCTYPE html>
<html>
<head>
	<title>Set up page</title>
	
	<link href="css/set-up.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
		<ol>
			<li><b>Enter your app information:</b>
				<form method="get" action="" id="app_info">
					<ul>
						<li><label for="app_id">App ID:</label> <input type="text" placeholder="App ID (e.g. 210199799004392)" id="app_id" /></li>
						<li><label for="app_secret">App Secret:</label> <input type="text" placeholder="App Secret (e.g. 6ab559d2f33d40c6dbd8a9e24851fbfd)" id="app_secret" /></li>
					</ul>
				</form>
			</li>

			<li><b>Copy this code and paste it into a file called <code>config.php</code></b> (but don't refresh this page yet):
				<p><textarea id="config_php"></textarea></p>
			</li>

			<li><b>Install the tab to your page:</b>
				<input type="button" id="install_to_page" value="Install" />
			</li>
		</ol>
	</div>

	<div id="fb-root"></div>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
	<script type="text/javascript">
		(function($, opts)
		{
			var app_id = '';
			var app_secret = '';
			
			function updateCode()
			{
				var str = "";
				str += "<" + "?" + "php\n";
				str += "define('FB_APP_ID', \"" + app_id + "\");\n";
				str += "define('FB_APP_SECRET', \"" + app_secret + "\");\n";
				
				$('#config_php').val(str);
			}
			
			$('#app_id').change(function()
			{
				app_id = $('#app_id').val();
				updateCode();
			});
			
			$('#app_secret').change(function()
			{
				app_secret = $('#app_secret').val();
				updateCode();
			});
			
			$('#install_to_page').click(function()
			{
				FB.init({
					appId: app_id,
					secret: app_secret
				});
				
				FB.ui({
					method: 'pagetab'
				});
			});
			
			if (typeof opts.app_id !== "undefined" && typeof opts.app_secret !== "undefined")
			{
				app_id = opts.app_id;
				$('#app_id').val(app_id);
				
				app_secret = opts.app_secret;
				$('#app_secret').val(app_secret);
				
				updateCode();
			}
			
		})($, <?=json_encode($opts); ?>);
	</script>
</body>
</html>
