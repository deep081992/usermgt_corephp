<?php 
session_start();
if(isset($_SESSION['logintrue']))
{
	include("connect.php");
	$token=$_SESSION['logintrue'];
	$res=mysqli_query($conn,"select *from users where token='$token'");
	$row=mysqli_fetch_assoc($res);
	include("header.php");
	
	?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Welcome to <?php echo $row['username'] ?>!</h1>
					<h5>Change Password</h5>
			
			<?php 
			if(isset($_COOKIE['success']))
			{
				echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
			}
			
			if(isset($_POST['submit']))
			{
				$opwd=$_POST['opwd'];
				$npwd=$_POST['npwd'];
				$cnpwd=$_POST['cnpwd'];
				
				if(!empty($npwd))
				{
					if(password_verify($opwd,$row['password']))
					{
						if($npwd==$cnpwd)
						{
			$pass=password_hash($npwd,PASSWORD_DEFAULT);
			mysqli_query($conn,"update users set password='$pass' where token='$token'");
			if(mysqli_affected_rows($conn)==1)
			{
				setcookie("success","Password changed successfullt",time()+2);
				header("Location:change_pass.php");
			}
			else
			{
				echo "<p class='alert alert-danger'>Sorry! Unable to change password. please try again</p>";
			}
			
						}
						else
						{
							echo "<p class='alert alert-danger'>Passwords does not matched</p>";
						}
					}
					else
					{
						echo "<p class='alert alert-danger'>Old password does not matched with DB password</p>";
					}
				}
				else
				{
					echo "<p class='alert alert-danger'>Please Enter the password</p>";
				}
				
			}
			?>
			
					<form method="POST" action="">
					
<div class="form-group">
	<label>Enter Old Password</label>
	<input type="password" class="form-control" name="opwd" id="opwd">
</div>

<div class="form-group">
	<label>Enter New Password</label>
	<input type="password" class="form-control" name="npwd" id="npwd">
</div>

<div class="form-group">
	<label>Confirm New Password</label>
	<input type="password" class="form-control" name="cnpwd" id="cnpwd">
</div>

<div class="form-group">
	<input type="submit" class="btn btn-success" name="submit" value="Update">
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
	header("Location:login.php");
}
?>