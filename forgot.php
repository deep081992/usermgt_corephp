<?php include("header.php");?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Forgot Password</h1>
			
			<?php 
			if(isset($_COOKIE['success']))
			{
				echo "<div class='alert alert-success'>".$COOKIE['success']."</div>";
			}
			
			if(isset($_POST['submit']))
			{
				$email=(isset($_POST['email']))?$_POST['email']:"";
				//check the mail exists or not in Db
				include("connect.php");
				
				$res=mysqli_query($conn,"select *from user where email='$email'");
				if(mysqli_num_rows($res)==1)
				{
					$row=mysqli_fetch_assoc($res);
					$to=$email;
					$subject="Reset Password Request-GOPHP";
					$message="Hi ".$row['username'].",<br><br> Your reset password request has been received.Please click the below link to reset your password.<br><br><a target='_blank' href='http://localhost/usersmgt/reset_password.php?key=".$row['token']."'>Reset Password</a><br><br>Thanks<br>Team";
					$headers="";
					$headers.="content-type:text/html"."\r\n";
					$headers.="From:info@company.com"."\r\n";
					
					//echo $message;
					
					if(mail($to,$subject,$message,$headers))
					{
						setcookie("success","Reset password link has been sent t your mail. please check",time()+2);
						header("Location:forgot.php");
					}
					else
					{
						echo "<P>Sorry! Unable to sent email. please contact Admin</p>";
					}
					
				}
				else
				{
					echo "<p class='alert alert-danger'>Sorry! This email does not exists</p>";
				}
				
				
			}
			?>
			
			<form method="POST" action="" onsubmit="return validate()">
			
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" id="email">
			</div>
			<div class="form-group">
				
				<input class="btn btn-danger" type="submit" name="submit" value="Submit">
			</div>
			</form>
			
		</div>
	</div>
</div>
<script>
function validate()
{
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
}
</script>
<?php include("footer.php");?>