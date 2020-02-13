<!DOCTYPE html>
<html>
	<head>
		<title> Home </title>
	</head>
	<body>
		<h1> Welcome from View </h1>
		<p> Hello <?php echo htmlspecialchars($name); ?></p>

		<ul>
			<?php foreach ($property as $pro):?>
				<li> <?php echo htmlspecialchars($pro); ?> </li>
			<?php endforeach; ?>
 		</ul>
	</body>
</html>