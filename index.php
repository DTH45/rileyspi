<!DOCTYPE html>
<html>
	<head>
		<title>Pi Server Hub</title>
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
		<div id="clock">
			<div id="clockhd">
				<?php
					echo exec("date '+%A, %b %d, %Y - %I:%M %p'");
				?>
			</div>
		</div>

		<div id="container">
			<div id="header">General Uptime Info:</div>
			<?php
				echo exec("uptime");
			?>
		</div>

		<div id="container">
			<div id="header">CPU Temperature:</div>
			<?php
				echo exec("sudo vcgencmd measure_temp");
			?>
		</div>

		<div id="container">
			<div id="header">Storage:</div>
			<?php
				echo exec("sudo df -h /");
			?>
		</div>

		<div id="container">
			<div id="header">Server Controls:</div>
			<?php
				if (isset($_POST['reboot']))
					{
						exec("sudo reboot");
					}
				if (isset($_POST['shutdown']))
					{
						exec("sudo shutdown -h now");
					}
				if (isset($_POST['update']))
					{
						exec("sudo apt-get update -y && sudo apt-get upgrade -y && sudo apt-get autoremove -y && sudo reboot");
						header("Location:index.php");
					}
			?>
			<form method="post">
				<button class="btn2" onclick="return confirm('Are you sure you want to run server updates? The server will reboot unexpectedly when finished.');" name="update">Update</button>
				<button class="btn2" onclick="return confirm('Are you sure you want to restart the server?');" name="reboot">Restart</button>
				<button class="btn2" onclick="return confirm('Are you sure you want to shutdown the server? It must be booted manually.');" name="shutdown">Shutdown</button><br>
			</form>
		</div>

		<div id="container">
			<div id="header">Audio Controls:</div>
			<form method="post">
				<button class="btn" name="volup">Volume Up</button>
				<button class="btn" name="volmt">Mute</button>
				<button class="btn" name="voldwn">Volume Down</button>
			</form>
			<?php
				echo exec("sudo amixer sget PCM");
				if (isset($_POST['volup']))
					{
						exec("sudo amixer sset PCM 8dB+");
						header("Location:index.php");
					}
				if (isset($_POST['volmt']))
					{
						exec("sudo amixer sset PCM toggle");
						header("Location:index.php");
					}
				if (isset($_POST['voldwn']))
					{
						exec("sudo amixer sset PCM 8dB-");
						header("Location:index.php");
					}
			?>
		</div>

		<div id="container">
			<div id="header">GPIO Controls:</div>
			<?php
				if (isset($_POST['1on']))
					{
						exec("./home/pi/pythonweb/relay1on.py");
						header("Location:index.php");
					}
				if (isset($_POST['1off']))
					{
						exec("./home/pi/pythonweb/relay1off.py");
						header("Location:index.php");
					}
				if (isset($_POST['2on']))
					{
						exec("./home/pi/pythonweb/relay2on.py");
						header("Location:index.php");
					}
				if (isset($_POST['2off']))
					{
						exec("./home/pi/pythonweb/relay2off.py");
						header("Location:index.php");
					}
				if (isset($_POST['3on']))
					{
						exec("./home/pi/pythonweb/relay3on.py");
						header("Location:index.php");
					}
				if (isset($_POST['3off']))
					{
						exec("./home/pi/pythonweb/relay3off.py");
						header("Location:index.php");
					}
				if (isset($_POST['4on']))
					{
						exec("./home/pi/pythonweb/relay4on.py");
						header("Location:index.php");
					}
				if (isset($_POST['4off']))
					{
						exec("./home/pi/pythonweb/relay4off.py");
						header("Location:index.php");
					}
				if (isset($_POST['5on']))
					{
						exec("./home/pi/pythonweb/relay5on.py");
						header("Location:index.php");
					}
				if (isset($_POST['5off']))
					{
						exec("./home/pi/pythonweb/relay5off.py");
						header("Location:index.php");
					}
				if (isset($_POST['6on']))
					{
						exec("./home/pi/pythonweb/relay6on.py");
						header("Location:index.php");
					}
				if (isset($_POST['6off']))
					{
						exec("./home/pi/pythonweb/relay6off.py");
						header("Location:index.php");
					}
				if (isset($_POST['reset']))
					{
						exec("./resetpins.py");
						header("Location:index.php");
					}
			?>
			<form method="post">
				<div id="relaycont">
					<div id="subhead">Relay 1:</div>
					<button class="btn" name="1on">On</button>
					<button class="btn" name="1off">Off</button>
				</div>

				<div id="relaycont">
					<div id="subhead">Relay 2:</div>
					<button class="btn" name="2on">On</button>
					<button class="btn" name="2off">Off</button>
				</div>

				<div id="relaycont">
					<div id="subhead">Relay 3:</div>
					<button class="btn" name="3on">On</button>
					<button class="btn" name="3off">Off</button>
				</div>
				<div id="relaycont">
					<div id="subhead">Relay 4:</div>
					<button class="btn" name="4on">On</button>
					<button class="btn" name="4off">Off</button>
				</div>
				<div id="relaycont">
					<div id="subhead">Relay 5:</div>
					<button class="btn" name="5on">On</button>
					<button class="btn" name="5off">Off</button>
				</div>
				<div id="relaycont">
					<div id="subhead">Relay 6:</div>
					<button class="btn" name="6on">On</button>
					<button class="btn" name="6off">Off</button>
				</div>
				<div id="relaycont">
					<div id="subhead">Relay 7:</div>
					<button class="btn" name="7on">On</button>
					<button class="btn" name="7off">Off</button>
				</div>
				<div id="relaycont">
					<div id="subhead">Relay 8:</div>
					<button class="btn" name="8on">On</button>
					<button class="btn" name="8off">Off</button>
				</div>

				<div id="relaycont">
					<div id="subhead">All:</div>
					<button class="btn2" onclick="return confirm('This sets all of the relays to their default positions (unpowered). Continue?');" name="reset">Reset</button>
				</div>
			</form>
		</div>
	</body>
</html>
