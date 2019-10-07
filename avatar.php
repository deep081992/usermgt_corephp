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
				<h1>Welcome to <?php echo ucfirst($row['username']);?>!</h1>
				<h4>Upload Avatar</h4>
				<?php 
				
				if(isset($_COOKIE['success']))
				{
					echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
				}
				if(isset($_POST['upload']))
				{
					if(is_uploaded_file($_FILES['file']['tmp_name']))
					{
						$types=array("image/png","image/jpeg","image/jpg","image/gif");
						
						$filename=$_FILES['file']['name'];
						$newname=time()."_".$filename;
						$tname=$_FILES['file']['tmp_name'];
						$type=$_FILES['file']['type'];
						
						if(in_array($type,$types))
						{
							if(move_uploaded_file($tname,"profiles/$newname"))
							{
								mysqli_query($conn,"update users set profile='$newname' where token='$token'");
								if(mysqli_affected_rows($conn))
								{
									setcookie("success","Avatar updated successfully",time()+2);
									header("Location:avatar.php");
								}
							}
							else
							{
								echo "<p class='alert alert-danger'>Sorry! Unable to move a file. contact admin</p>";
							}
						}
						else
						{
							echo "<p class='alert alert-danger'>Please select a valid file(.gif,.jpg,.png,.jpeg) to upload</p>";
						}
						
					}
					else
					{
						echo "<p class='alert alert-danger'>Please select a file to upload</p>";
					}
				}
				?>
				
				
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Please select a file upload</label>
						<input type="file" name="file" class="form-control">
					</div>
					<div class="form-group">
						
						<input type="submit" name="upload" class="btn btn-success" value="Upload">
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