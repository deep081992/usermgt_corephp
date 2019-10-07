<?php 
session_start();
if(isset($_SESSION['logintrue']))
{
	include("connect.php");
	
	$token=$_SESSION['logintrue'];
	
	$res=mysqli_query($conn,"select *from users where token='$token'");
	
	$row=mysqli_fetch_assoc($res);
	
	//print_r($row);
	include("header.php");
	?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Welcome to <?php echo ucfirst($row['username']);?>!</h1>
					
					<table class="table">
						<tr>
							<td>UserName</td>
							<td><?php echo ucfirst($row['username']);?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $row['email'];?></td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td><?php echo $row['mobile'];?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><?php echo $row['gender'];?></td>
						</tr>
						<tr>
							<td>City</td>
							<td><?php echo $row['city'];?></td>
						</tr>
						<tr>
							<td>State</td>
							<td><?php echo $row['state'];?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><?php echo $row['status'];?></td>
						</tr>
						<tr>
							<td>Date of Reg</td>
							<td><?php echo $row['date_of_reg'];?></td>
						</tr>
					</table>
					
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