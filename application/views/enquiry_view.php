<html>
	<head>
		<title>Enquiry Form</title>
	</head>
	<body>
		<h1>Enquiry Form</h1>
		
		<?php 
		if($this->session->tempdata("success"))
		{
			echo "<p>".$this->session->tempdata("success")."</p>";
		}
		if($this->session->tempdata("error"))
		{
			echo "<p>".$this->session->tempdata("error")."</p>";
		}
		?>
		
		<?php 
		echo validation_errors();
		?>
		<?php echo form_open();?>
		<table>
			<tr>
				<td>Name</td>
				<td><input value="<?php echo set_value("name")?>" type="text" name="name">
				
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input value="<?php echo set_value("email");?>" type="text" name="email">
				
				</td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><input value="<?php echo set_value("mobile")?>" type="text" name="mobile"></td>
			</tr>
			<tr>
				<td>Message</td>
				<td><textarea name="msg"><?php echo set_value("msg")?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Send"></td>
			</tr>
		</table>
		<?php echo form_close();?>
		
	</body>
</html>