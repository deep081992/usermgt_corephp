<html>
	<head>
		<title>PHP Skill Set</title>
	</head>
	<body>
		<h1>PHP Skill Set</h1>
		<?php 
		//print_r($subjects);
		if(count($subjects)>0)
		{
			foreach($subjects as $sub)
			{
				echo "<p>".$sub."</p>";
			}
		}
		else
		{
			echo "NO Subjects found";
		}
		
		?>
	</body>
</html>