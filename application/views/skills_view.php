<html>
	<head>
		<title>PHP Skills for Interview</title>
	</head>
	<body>
		<h1>PHP Skills for Interview</h1>
		<?php 
		if(count($subjects)>0)
		{
			foreach($subjects as $sub)
			{
				echo $sub."<br>";
			}
		}
		else
		{
			echo "<p>No Subjects Found</p>";
		}
		?>
	</body>
</html>