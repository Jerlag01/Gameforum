<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
  <?php 
	include ('./required/connection.php');
	include ('./required/queries.php');
	session_start();
	$_SESSION['message'] = '';
	
	$query = mysqli_query($conn, $sitename);
	if (! $query) {
		die ('Could not fetch Sitename: '. mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($query)) {
		$_SESSION['title'] = $title = $row['sitename'];
	}
	
	if (!empty($_GET["error"])) {
		$error = $_GET["error"];
		$errors = array("Emtpy fields", "incorrect login");
		$message = '<div class="alert"><p>' . $errors[$error] . "</p></div>";
	}
  ?>

  <title><?php echo $title ?> | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
    		<a href="./login.php"><?php echo $title; ?></a>
		</div>
		<div class="card">
    		<div class="card-body login-card-body">
    			<p class="login-box-msg">Sign in to get access to the admin panel</p>
	      		<form action="./required/check.php" method="post">
    	    		<div class="input-group mb-3">
        	  			<input type="text" class="form-control" placeholder="Email or Username" autocomplete="off">
          					<div class="input-group-append">
            					<div class="input-group-text">
              					<span class="fas fa-envelope"></span>
            				</div>
          				</div>
        			</div>
        			<div class="input-group mb-3">
          				<input type="password" class="form-control" placeholder="Password" autocomplete="off">
          					<div class="input-group-append">
            					<div class="input-group-text">
              						<span class="fas fa-lock"></span>
            					</div>
          					</div>
        			</div>
        			<div class="row">
          				<div class="col-4">
            				<button type="submit" class="btn btn-primary btn-block">Sign In</button>
          				</div>
        			</div>
      			</form>
    		</div>
		</div>
  		<div class="text-center">
			<strong>Copyright &copy; 2019-<?php echo date('Y'); ?> <a> Artesis Plantijn Antwerpen - Professionele Bachelor Electronica - ICT </a>.</strong> All rights reserved.
  		</div>
	</div>

	<script src="./plugins/jquery/jquery.min.js"></script>
	<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
