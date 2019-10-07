<html>
	<head>
		<title>Contact users list</title>
	</head>
	<body>
		<h1>Contact Users List</h1>
		<?php 
		if(!empty($records))
		{
			?>
				<table>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Message</th>
			</tr>
			<?php 
			foreach($records as $rec)
			{
				?>
			<tr>
				<td><?php echo $rec->id;?></td>
				<td><?php echo $rec->name;?></td>
				<td><?php echo $rec->email;?></td>
				<td><?php echo $rec->mobile;?></td>
				<td><?php echo $rec->message;?></td>
				
			</tr>
				<?php
			}
			?>
			
		</table>
			<?php
		}
		else
		{
			echo "Sorry! NO records";
		}
		?>

		
	</body>
</html>