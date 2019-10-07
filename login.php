<?php 
session_start();
include("connect.php");
include("header.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		
			<h1>Login</h1>
			
			<?php 
			if(isset($_COOKIE['success']))
			{
				echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
			}
			
			if(isset($_POST['login']))
			{
				$email=(isset($_POST['email']))?$_POST['email']:"";
				$pwd=(isset($_POST['pwd']))?$_POST['pwd']:"";
				
				$res=mysqli_query($conn,"select *from user where email='$email'");
				
				if(mysqli_num_rows($res)==1)
				{
					$row=mysqli_fetch_assoc($res);
					if(password_verify($pwd,$row['password']))
					{
						if($row['status']=="active")
						{
							$_SESSION['logintrue']=$row['token'];
							header("location:home.php");
						}
						else
						{
							echo "<p class='alert alert-warning'>Please activate your account</p>";
						}
					}
					else
					{
						echo "<p class='alert alert-danger'>Password Does not matched</p>";
					}
				}
				else{
					echo "<p class='alert alert-danger'>Sorry! This email id does not exists</p>";
				}
				
			}
			
			?>
			
			<form method="POST" action="" onsubmit="return loginValidate()">
			
				<table class="table">
					<tr>
						<td>Email</td>
						<td><input class="form-control" type="text" name="email" id="email"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input class="form-control"  type="password" name="pwd" id="pwd"></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="brn btn-primary" type="submit" name="login" value="Login"> <a href="forgot.php">Forgot Password?</a></td>
					</tr>
				</table>
				
			</form>
		</div>
	</div>
</div>

<script>
function loginValidate()
{
	//email validation
	var mail=document.getElementById("email").value;
	if(mail=="")
	{
		alert("Enter Email");
		return false;
	}
	else
	{
		var regEx=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regEx.test(mail))
		{
			alert("Enter Valid Email address");
			return false;
		}
	}
	if(document.getElementById("pwd").value=="")
	{
		alert("Enter Password");
		return false;
	}
}

</script>

<?php
include("footer.php");
?>