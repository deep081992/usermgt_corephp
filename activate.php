<?php 
if(isset($_REQUEST['key']))
{
	$key=$_REQUEST['key'];
	include("connect.php");
	$res=mysqli_query($conn,"select *from users where token='$key'");
	if(mysqli_num_rows($res)==1)
	{
		$row=mysqli_fetch_assoc($res);
		if($row['status']=="active")
		{
			echo "<p>Your account is already activated</p>";
		}
		else
		{
			mysqli_query($conn,"update users set status='active' where token='$key'");
			if(mysqli_affected_rows($conn)==1)
			{
				echo "<p>Account activated successfully. Please <a href='login.php'>Login</a>login now</p>";
			}
		}
	}
	else
	{
		echo "<p>Sorry! Unable to update status</p>";
	}
}
else
{
	echo "Sorry! Wrong window";
}
?>