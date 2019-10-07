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
				<h1>Welcome to <?php echo ucfirst($row['username'])?>!</h1>
				<h4>Edit Profile</h4>
				
				<?php
				if(isset($_COOKIE['success']))
				{
					echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
				}
				if(isset($_COOKIE['error']))
				{
					echo "<p class='alert alert-danger'>".$_COOKIE['error']."</p>";
				}
				
				if(isset($_POST['save']))
				{
					$name=(isset($_POST['uname']))?$_POST['uname']:"";
					$mobile=(isset($_POST['mobile']))?$_POST['mobile']:"";
					$city=(isset($_POST['city']))?$_POST['city']:"";
					$state=(isset($_POST['state']))?$_POST['state']:"";
					
					mysqli_query($conn,"update users set 
					username='$name',
					mobile='$mobile',
					city='$city',
					state='$state' where token='$token'
					");
					
					if(mysqli_affected_rows($conn)==1)
					{
						setcookie("success","Profile updated successfully",time()+2);
						header("Location:edit.php");
					}
					else
					{
						setcookie("error","Sorry! Unable to update profile",time()+2);
						header("Location:edit.php");
					}
					
					
				}
				?>
				
				<form method="POST" action="" onsubmit="return registerValidation()">
			<table class="table">
				<tr>
					<td>Username</td>
					<td><input class="form-control" type="text" name="uname" id="uname" value="<?php echo $row['username'];?>"></td>
				</tr>

				<tr>
					<td>Mobile</td>
					<td><input class="form-control" type="text" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>"></td>
				</tr>
				
				<tr>
					<td>City</td>
					<td><input class="form-control" type="text" name="city" id="city" value="<?php echo $row['city'];?>"></td>
				</tr>
				
				<tr>
					<td>State</td>
					<td>
						<select class="form-control" id="state" name="state">
							<option value="">--Select State--</option>
		<option <?php if($row['state']=="Andhrapradesh") echo "selected"; ?> value="Andhrapradesh">Andhrapradesh</option>
		<option <?php if($row['state']=="Telangana") echo "selected"; ?> value="Telangana">Telangana</option>
						</select>
					</td>
				</tr>
				
				
				<tr>
					<td></td>
					<td><input class="btn btn-primary" type="submit" name="save" value="Update"></td>
				</tr>
				
			</table>
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