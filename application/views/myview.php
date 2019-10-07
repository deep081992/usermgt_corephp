<!--application/views/myview.php-->
<html>
	<head>
		<title>PHP Developer</title>
	</head>
	<body>
		<h1>PHP Developer Skill Set</h1>
		<?php //print_r($data['subjects']);?>
		
		<ul>
			<?php 
			foreach($subjects as $sub)
			{
				echo "<li>".$sub."</li>";
			}
			?>
		</ul>
	</body>
</html>