<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
  <?php 
	include ('../required/connection.php');
	include ('../required/queries.php');
	session_start();
	$_SESSION['message'] = '';
	
	$query = mysqli_query($conn, $sitename);
	if (! $query) {
		die ('Could not fetch Sitename: '. mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($query)) {
		$_SESSION['title'] = $title = $row['sitename'];
	}
  ?>

  <title><?php echo $title ?> | Admin</title>

  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
	
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

  		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    		<ul class="navbar-nav">
      			<li class="nav-item">
       				<a class="nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i></a>
      			</li>
    		</ul>
    		<ul class="navbar-nav ml-auto">
      			<li class="nav-item">
        			<a class="nav-link" href="../../index.php" target="_blank">
						<i class="fas fa-th-large"></i>
					</a>
      			</li>
    		</ul>
  		</nav>
	
  		<aside class="main-sidebar sidebar-dark-primary elevation-4">
    		<a href="./index.php" class="brand-link">
      			<img src="../required/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      			<span class="brand-text font-weight-light"><?php echo $title; ?></span>
    		</a><br>
    		<div class="sidebar">
      			<nav class="mt-2">
        			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">NAVIGATION</li>
          					<li class="nav-item has-treeview">
            					<a href="../index.php" class="nav-link">
              						<i class=" fas fa-tachometer-alt"></i>
              						<p>Home</p>
            					</a>
							</li>
            				<li class="nav-item has-treeview menu-open">
                				<a href="./" class="nav-link active">
                  					<i class="nav-icon fas fa-users-cog"></i>
                  					<p>User Management</p>
                					<i class="right fas fa-angle-left"></i>
                				</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="./" class="nav-link">
											<i class="fas fa-users nav-icon"></i>
											<p>List All Users</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="./staff.php" class="nav-link">
											<i class="fas fa-users nav-icon"></i>
											<p>List Staff Users</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="./list.php" class="nav-link">
											<i class="fas fa-user-plus nav-icon"></i>
											<p>List Members</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="./create.php" class="nav-link active">
											<i class="fas fa-user-plus nav-icon"></i>
											<p>Add User</p>
										</a>
									</li>
								</ul>
              				</li>
              				<li class="nav nav-treeview">
								<li class="nav-item">
                					<a href="../groups/" class="nav-link">
                  						<i class="fas fa-user-circle"></i>
                  						<p>Groups</p>
                					</a>
              					</li>
            				</li>
							<li class="nav nav-treeview">
								<li class="nav-item">
                					<a href="../settings/" class="nav-link">
                  						<i class="fas fa-cogs"></i>
                  						<p>Settings</p>
                					</a>
              					</li>
            				</li>
							<li class="nav nav-treeview">
								<li class="nav-item">
                					<a href="./games/" class="nav-link">
                  						<i class="fas fa-gamepad"></i>
                  						<p>Games</p>
                					</a>
              					</li>
            				</li>
        			</ul>
      			</nav>
    		</div>
  		</aside>

  		<div class="content-wrapper">
    		<div class="content-header">
      			<div class="container-fluid">
        			<div class="row mb-2">
        				<div class="col-sm-6">
         					<h1 class="m-0 text-dark">User Management</h1>
          					</div>
          					<div class="col-sm-6">
            					<ol class="breadcrumb float-sm-right">
              						<li class="breadcrumb-item">Users</li>
              						<li class="breadcrumb-item active">Create</li>
            					</ol>
        					</div>
        				</div>
      				</div>
    			</div>

    			<div class="content">
					<div class="container-fluid">
						<div class="card card-default">
    	    				<div class="card-header">
                           		<h3 class="card-title">Add User</h3>
							</div>
							<div class="card-body">
            					<div>
									<div class="form-group">
                						<form role="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    						<div>
                        						<div class="card card-primary">
                            						<div class="card-body">
														<div class="form-group">
                                    						<label for="username" class="control-label">Username</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="username" placeholder="Username" class="form-control" required/>
                                    						</div>
														</div>
                                						<div class="form-group">
                                    						<label for="name_first" class="control-label">First Name</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="name_first" placeholder="First Name" class="form-control" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="name_last" class="control-label">Last Name</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="name_last" placeholder="Last Name" class="form-control" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="email" class="control-label">Email</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="email" placeholder="Email" class="form-control" required/>
                                    						</div>
                                						</div>
														<div class="form-group">
                                    						<label for="phone" class="control-label">Phone Number</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="phone" placeholder="Phone Number" class="form-control" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="birthdate" class="control-label">Birthdate</label>
                                    						<div>
                                        						<input type="date" autocomplete="off" name="birthdate" placeholder="birth date" class="form-control" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="country" class="control-label">Country</label>
                                    						<div>
                                        						<select name="country" class="form-control">
																	<?php
																		foreach ($countries as $ctry => $value) {
																			?>
																				<option value="<?php echo $ctry;?>"><?php echo $value;?></option>
																	<?php };
																	?>
																</select>
                                    						</div>
                                						</div>
														<div class="form-group">
															<label for="gender" class="control-label">Gender</label>
															<div>
																<select name="gender" class="form-control">
																	<option value="Unspecified">Unspecified</option>
																	<option value="Men">Men</option>
																	<option value="Woman">Woman</option>
																</select>
															</div>
														</div>
                            						</div>
                        						</div>
                    						</div>
                    						<div>
                        						<div class="card card-warning">
                            						<div class="card-header">
                                						<h3 class="card-title">Password and Permissions</h3>
                            						</div>
                            						<div class="card-body">
                                						<div class="form-group">
                                    						<label for="pass" class="control-label">Password</label>
                                    						<div>
                                        						<input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="off"/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="passconf" class="control-label">Confirm Password</label>
                                    						<div>
                                        						<input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required/>
                                    						</div>
                                						</div>
														<div class="form-group">
                                    						<label for="group" class="control-label">Group</label>
                                    						<div>
                                        						<select name="group" class="form-control">
                                            						<?php
                                                						$group = 'SELECT * FROM groups';
                                                						$groups = mysqli_query($conn, $group);

                                                						if(! $groups) {
                                                    						die('Could not get groups: '. mysqli_error(conn));
                                                						}

                                                						while($row = mysqli_fetch_assoc($groups)) {
                                                    				?>
                                                    				<option value="<?php echo $row['idgroups']; ?>"><?php echo $row['groupname']; ?></option>
                                                					<?php   }
                                            						?>
                                        						</select>
                                        					<p class="alert alert-danger"><small><b>The group Administrators gives a user all permissions. Be carefull with this setting!!</b></small></p>
                                    					</div>
                                					</div>
													<div class="form-group">
                                    					<label for="isadmin" class="control-label">Is User Root-Admin?</label>
                                    					<div>
															<select name"isadmin" class="form-control">
																<option value="0">No</option>
																<option value="1">Yes</option>
															</select>
                                        					<p class="alert alert-danger"><small><b>This setting gives a user all access no matter what his/hers group is!</b></small></p>
                                    					</div>
                                					</div>
                            					</div>
                        					</div>
											<?php $_SESSION['message']; ?>
                    					</div>										
                            			<div class="card-footer">
											<button type="submit" class="btn btn-success btn-sm">Add User</button>
                            			</div>
                					</form>
            					</div>
        					</div>
						</div>
					</div>	
  				</div>
			</div>
		</div>
	<footer class="main-footer">
    	<?php include('../required/footer.php');?>
	</footer>

	<script src="../plugins/jquery/jquery.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../dist/js/adminlte.min.js"></script>
</body>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		if ($_POST['password'] == $_POST['confirmpassword']) {
       		$username = $conn->real_escape_string($_POST['username']);
       		$lastname = $conn->real_escape_string($_POST['name_last']);
       		$firstname = $conn->real_escape_string($_POST['name_first']);
       		$email = $conn->real_escape_string($_POST['email']);
       		$phone = $conn->real_escape_string($_POST['phone']);
       		$birthdate = $conn->real_escape_string($_POST['birthdate']);
			$gender = $conn->real_escape_string($_POST['gender']);
			$country = $conn->real_escape_string($_POST['country']);
			$isadmin = $conn->real_escape_string($_POST['isadmin']);

       		$joindate = date("Y-m-d");
       		$groupid = $conn->real_escape_string($_POST['group']);
       		$password = md5($_POST['password']);
			
       		$_SESSION['username'] = $username;
        	$register = "INSERT INTO users (username, name, lastname, email, phone, country, password, groupid, registered, birthdate, gender, isadmin)" . "VALUES ('$username', '$lastname', '$firstname', '$email', '$phone', '$country', '$password', '$groupid', '$joindate', '$birthdate', '$gender', '$isadmin')";

        	if ($conn->query($register) === true) {
           		$_SESSION['message'] = "$username has been added.";
				echo "<script>location.href = './index.php';</script>";
        	}
        	else {
           		$_SESSION['message'] = "$username could not be added. Please contact your Support Team.";
        	}
        	mysqli_close($conn);

    	}
    	else {
        	$_SESSION['message'] = "The given passwords don't match with each other!";
    	}
	}
?>
</html>