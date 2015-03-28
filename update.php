<html>
	<form name="update_enter_db" method="POST">
		Database server IP: <input type="text" name="serverip"><br>
		Database server username: <input type="text" name="serveruser"><br>
		Database server password: <input type="text" name="serverpass"><br>
		Database server DB: <input type="text" name="serverdb"><br>
		
		<input type="submit" name="update_db" value="Update database">
	</form>
	
	<?php
	
		if(isset($_POST['update_db']))
		{
			$username = $_POST['serveruser'];
			$password = $_POST['serverpass'];
			$serverip = $_POST['serverip'];
			$servername = $_POST['servername'];
			
			mysql_connect($serverip, $username, $password) or die("Unable to login.");
			mysql_select_db($servername) or die("Unable to select DB.");
			
			mysql_query("ALTER TABLE `players` ADD `IsBanned` INT NOT NULL ;") or die("Unable to update.");
			
			mysql_query("ALTER TABLE `players` ADD `BanDate` DATE NOT NULL ;") or die("Unable to update.");
			
			echo 'Updated the database.';
			unset($_POST['update_db']);
		}
	?>
</html>
