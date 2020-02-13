<!DOCTYPE html>
<html>
	<head>
		<title> Output Escaping </title>
	</head>
	<body>
		<h1> Output Escaping </h1>
		
		<?php
			if (isset($_POST['submit']))
			{
				echo "Name:" . htmlspecialchars($_POST['name']);
			}
		?>
	<form action="Output_Escaping.php" method=POST>
		Name: <input type="text" name="name"/>
		<input type="submit" name="submit" value="SUBMIT"/>
	</form> 
	<body>
</html>