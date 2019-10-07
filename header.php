<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Management</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">UserMgt</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
		 
		 <?php 
		 if(isset($_SESSION['logintrue']))
		 {
			 ?>
			 <li class="nav-item dropdown">
			
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="images/avatar.png" height="25" width="25"> Welcome <?php echo ucfirst($row['username'])?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
			     <a class="dropdown-item" href="home.php">My Profile</a>
          <a class="dropdown-item" href="">Edit Profile</a>
          <a class="dropdown-item" href="">Upload Avatar</a>
          <a class="dropdown-item" href="change_pass.php">Change Password</a>
	         <a class="dropdown-item" href="logout.php">Logout</a>
              
            </div>
          </li>
			 <?php
		 }
		 else
		 {
			 ?>
		 <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
			 <?php
		 }
		 ?>
		 
          
          
        </ul>
      </div>
    </div>
  </nav>

  <header>