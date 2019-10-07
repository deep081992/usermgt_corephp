<html>
	<head>
		<title>Display Calendar</title>
	</head>
	<body>
		<h1>Display Calendar</h1>
		<div>
			<?php echo $this->calendar->generate($year,$month);?>
		</div>
	</body>
</html>