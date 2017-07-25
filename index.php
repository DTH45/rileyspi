<!DOCTYPE html>
<html>
	<head>
		<title>Riley's Raspberry Pi 3</title>
		<link href="/style.css" rel="stylesheet"/>
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<script>
			setTimeout(function(){
				window.location.reload(1);
			}, 5000);
		</script>
	</head>

	<body>
		<div id="container">
			<div id="header">General Uptime Info:</div>
			<?php
				echo exec("uptime");
			?>
		</div>

		<div id="container">
			<div id="header">Average CPU Temperature:</div>
			<?php
				echo exec("sudo vcgencmd measure_temp");
			?>
		</div>

		<div id="container">
			<div id="header">Storage:</div>
			<?php
				echo exec("df -h /");
			?>
		</div>

		<div id="container">
			<div id="header">=Controls=</div>
			<?php
				if (isset($_POST['reboot']))
					{
						exec("sudo reboot");
					}
				if (isset($_POST['shutdown']))
					{
						exec("sudo shutdown -h now");
					}
				if (isset($_POST['volup']))
					{
						exec("sudo amixer sset PCM 15dB+");
					}
				if (isset($_POST['volmt']))
					{
						exec("sudo amixer sset PCM toggle");
					}
				if (isset($_POST['voldwn']))
					{
						exec("sudo amixer sset PCM 15dB-");
					}
			?>
			<form method="post">
				<button class="btn" name="reboot">Restart Server</button>
				<button class="btn" name="shutdown">Shutdown Server</button><br>
				<button class="btn" name="volup">Volume Up</button>
				<button class="btn" name="volmt">Mute</button>
				<button class="btn" name="voldwn">Volume Down</button>
			</form>
		</div>
	</body>
</html>
