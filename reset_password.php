<?php 
if(isset($_REQUEST['key']))
{
	include("connect.php");
	$token=$_REQUEST['key'];
	$res=mysqli_query($conn,"select *from users where token='$token'");
	if(mysqli_num_rows($res)==1)
	{
		include("header.php");
		?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<h1>Update Password</h1>
					<?php 
					if(isset($_POST['submit']))
					{
						$pwd=$_POST['npwd'];
						$cpwd=$_POST['cnpwd'];
						if(!empty($pwd))
						{
							if($pwd==$cpwd)
							{
								$pass=password_hash($pwd,PASSWORD_DEFAULT);
				mysqli_query($conn,"update users set password='$pass' where token='$token'");
				if(mysqli_affected_rows($conn)==1)
				{
					setcookie("success","Password changed successfully",time()+2);
					header("Location:login.php");
				}
				else
				{
					echo "<p>Sorry! Unable to change password. please try again</p>";
				}
								
							}
							else
							{
								echo "<p>Passwords does not matched</p>";
							}
						}
						else
						{
							echo "<p>Please enter the password</p>";
						}
						
					}
					?>
					
					
					<form method="POST" action="">
						<div class="form-group">
	<label>New Password</label>
	<input type="password" class="form-control" name="npwd" id="npwd">
</div>

<div class="form-group">
	<label>Confirm New Password</label>
	<input type="password" class="form-control" name="cnpwd" id="cnpwd">
</div>

<div class="form-group">
	
	<input type="submit" class="btn btn-danger" name="submit">
</div>

					</form>
					</div>
				</div>
			</div>
		<?php
		include("footer.php");
	}
	else
	{
		exit("We are unable to find your account");
	}
}
else
{
	exit("You don't have permission to access this page");
}
?>