<?php 
//4.2 connect to DB
include("connect.php");
include("header.php");?>
		
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<h1>Register Here</h1>
		
		<?php 
		if(isset($_POST['save']))
		{
			//4th setp
			//4.1 collect form data
			$name=(isset($_POST['uname']))?$_POST['uname']:"";
			$email=(isset($_POST['email']))?$_POST['email']:"";
			$pass=(isset($_POST['pwd']))?$_POST['pwd']:"";
			$pass=password_hash($pass,PASSWORD_DEFAULT);
			$mobile=(isset($_POST['mobile']))?$_POST['mobile']:"";
			$gender=(isset($_POST['gender']))?$_POST['gender']:"";
			$city=(isset($_POST['city']))?$_POST['city']:"";
			$state=(isset($_POST['state']))?$_POST['state']:"";
			$tnc=(isset($_POST['terms']))?$_POST['terms']:"";
			
			$ip=$_SERVER['REMOTE_ADDR'];
			$token=md5(str_shuffle($name.$email.$mobile.$gender.$pass));
			date_default_timezone_set("Asia/Calcutta");
			$date=date("Y-m-d h:i:s");
			
			//4.3 insert data into table.before insert, create the table to store data
			
			mysqli_query($conn,"insert into users(username,email,password,mobile,gender,city,state,terms,token,ip,date_of_reg) values('$name','$email','$pass','$mobile','$gender','$city','$state','$tnc','$token','$ip','$date')");
			if(mysqli_affected_rows($conn)==1)
			{
				$to=$email;
				$subject="Account Activation - GoPHP";
				
				$message="Hi ".ucfirst($name).",<br><br>THanks, your account created successfully with us.please click the below link to activate your account<br>
				<a href='http://localhost/9am/activate.php?key=".$token."' target='_blank'>Activate Now</a><br><br>Thanks<br>Team";
				//echo $message;
				$headers="";
				$headers.="Content-Type:text/html"."\r\n";
				$headers.="From:info@example.com"."\r\n";
				
				if(mail($to,$subject,$message,$headers)==1)
				{
					echo "<p>Account created successfully. Please activate your account</p>";
				}
				else
				{
					echo "<p>Sorry! Unable to send activation link. please contact admin</p>";
				}
			}
			else
			{
				echo "<p>Sorry! Unable to create an account try again</p>";
			}
			
		}
		?>
		
		<form method="POST" action="" onsubmit="return registerValidation()">
			<table class="table">
				<tr>
					<td>Username</td>
					<td><input class="form-control" type="text" name="uname" id="uname"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input class="form-control" type="text" name="email" id="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="form-control" type="password" name="pwd" id="pwd"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input class="form-control" type="password" name="cpwd" id="cpwd"></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><input class="form-control" type="text" name="mobile" id="mobile"></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<input type="radio" name="gender" value="Male">Male&nbsp;
						<input value="Female" type="radio" name="gender" >Female
					</td>
				</tr>
				<tr>
					<td>City</td>
					<td><input class="form-control" type="text" name="city" id="city"></td>
				</tr>
				
				<tr>
					<td>State</td>
					<td>
						<select class="form-control" id="state" name="state">
							<option value="">--Select State--</option>
							<option value="Andhrapradesh">Andhrapradesh</option>
							<option value="Telangana">Telangana</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="checkbox" name="terms" id="terms" value="1">Please accept terms and conditions</td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-primary" type="submit" name="save" value="Register">
						
					</td>
				</tr>
				
			</table>
		</form>
		
		<script>
			function registerValidation()
			{
				if(document.getElementById("uname").value=="")
				{
					alert("Enter Username");
					return false;
				}
				if(document.getElementById("email").value=="")
				{
					alert("Enter Email");
					return false;
				}
			}
		</script>
					
				</div>
			</div>
		</div>
		
		
<?php 
include("footer.php");
?>