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
	$id = htmlspecialchars($_GET["id"]);
	$_SESSION['message'] = '';
	
	$query = mysqli_query($conn, $sitename);
	if (! $query) {
		die ('Could not fetch Sitename: '. mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($query)) {
		$_SESSION['title'] = $title = $row['sitename'];
	}
	
	$userinfo = "SELECT * FROM users INNER JOIN groups on users.groupid = groups.idgroups";
	$getinfo = mysqli_query($conn, $userinfo);
	
	if (! $getinfo) {
		die('Could not fetch data from database: '. mysqli_error($conn));
	}
	while($row1 = mysqli_fetch_assoc($getinfo)) {
		
		$username = htmlspecialchars($row1['username']);
		$name = htmlspecialchars($row1['name']);
		$firstname = htmlspecialchars($row1['firstname']);
		$email = htmlspecialchars($row1['email']);
		$phone = htmlspecialchars($row1['phone']);
		$country = htmlspecialchars($row1['country']);
		$groupname = htmlspecialchars($row1['groupname']);
		$registered = htmlspecialchars($row1['registered']);
		$birthdate = htmlspecialchars($row1['birthdate']);
		$gender = htmlspecialchars($row1['gender']);
		$isadmin = htmlspecialchars($row1['isadmin']);
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
      			<img src="../../img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
										<a href="./create.php" class="nav-link">
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
              						<li class="breadcrumb-item active">Modify</li>
            					</ol>
        					</div>
        				</div>
      				</div>
    			</div>

    			<div class="content">
					<div class="container-fluid">
						<div class="card card-default">
    	    				<div class="card-header">
                           		<h3 class="card-title">Edit User</h3>
							</div>
							<div class="card-body">
            					<div>
									<div class="form-group">
                						<form role="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    						<div>
                        						<div class="card card-primary">
                            						<div class="card-body">
														<div class="form-group">
                                    						<label for="newusername" class="control-label">Username</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newusername" placeholder="Username" class="form-control" value="<?php echo $username ;?>" required/>
                                    						</div>
														</div>
                                						<div class="form-group">
                                    						<label for="newname_first" class="control-label">First Name</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newname_first" placeholder="First Name" class="form-control" value="<?php echo $firstname ;?>" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="newname_last" class="control-label">Last Name</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newname_last" placeholder="Last Name" class="form-control" value="<?php echo $name ;?>" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="newemail" class="control-label">Email</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newemail" placeholder="Email" class="form-control" value="<?php echo $email ;?>" required/>
                                    						</div>
                                						</div>
														<div class="form-group">
                                    						<label for="newphone" class="control-label">Phone Number</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newphone" placeholder="Phone Number" class="form-control" value="<?php echo $phone ;?>" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="newbirthdate" class="control-label">Birthdate</label>
                                    						<div>
                                        						<input type="date" autocomplete="off" name="newbirthdate" placeholder="birth date" class="form-control" value="<?php echo $birthdate ;?>" required/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="newcountry" class="control-label">Country</label>
                                    						<div>
                                        						<input type="text" autocomplete="off" name="newcountry" placeholder="birth date" class="form-control" value="<?php echo $country ;?>" required/>
                                    						</div>
                                						</div>
														<div class="form-group">
															<label for="newgender" class="control-label">Gender</label>
															<div>
																<select name="newgender" class="form-control" required>
																	<?php if ($gender = "men") {?>
																		<option value="men" selected>Men</option>
																		<option value="woman">Woman</option>
																		<option value="Unspecified">Unspecified</option>
																	<?php } elseif ($gender = "women") {?>
																		<option value="men">Men</option>
																		<option value="woman" selected>Woman</option>
																		<option value="Unspecified">Unspecified</option>
																	<?php } else { ?>
																		<option value="men">Men</option>
																		<option value="woman">Woman</option>
																		<option value="Unspecified" selected>Unspecified</option>
																	<?php }; ?>
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
                                    						<label for="newpassword" class="control-label">Password</label>
                                    						<div>
                                        						<input type="password" name="newpassword" placeholder="Password" class="form-control" autocomplete="off"/>
                                    						</div>
                                						</div>
                                						<div class="form-group">
                                    						<label for="newconfirmpassword" class="control-label">Confirm Password</label>
                                    						<div>
                                        						<input type="password" name="newconfirmpassword" placeholder="Confirm Password" class="form-control"/>
                                    						</div>
                                						</div>
														<div class="form-group">
                                    						<label for="newgroup" class="control-label">Group</label>
                                    						<div>
                                        						<select name="newgroup" class="form-control">
                                            						<?php
                                                						$getgroups = mysqli_query($conn, $groups);

                                                						if(! $getgroups) {
                                                    						die('Could not get groups: '. mysqli_error(conn));
                                                						}

                                                						while($row2 = mysqli_fetch_assoc($getgroups)) {
                                                    				?>
                                                    				<option value="<?php echo $row2['idgroups']; ?>"><?php echo $row2['groupname']; ?></option>
                                                					<?php   }
                                            						?>
                                        						</select>
                                        					<p class="alert alert-danger"><small><b>The group Administrators gives a user all permissions. Be carefull with this setting!!</b></small></p>
                                    					</div>
                                					</div>
													<div class="form-group">
                                    					<label for="newisadmin" class="control-label">Admin</label>
                                    					<div>
															<select name="newisadmin" class="form-control" required>
																<?php if ($admin = 1) {?>
																	<option name="newisadmin" class="form-control" value="0">No</option>
																	<option name="newisadmin" class="form-control" value="1" selected>Yes</option>
																<?php }	else { ?>
																	<option name="newisadmin" class="form-control" value="0" selected>No</option>
																	<option name="newisadmin" class="form-control" value="1">Yes</option>
																<?php }; ?>
															</select>
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
       		$newusername = $conn->real_escape_string($_POST['newusername']);
       		$newlastname = $conn->real_escape_string($_POST['newname_last']);
       		$newfirstname = $conn->real_escape_string($_POST['newname_first']);
       		$newemail = $conn->real_escape_string($_POST['newemail']);
       		$newphone = $conn->real_escape_string($_POST['newphone']);
       		$newbirthdate = $conn->real_escape_string($_POST['newbirthdate']);
			$newgender = $conn->real_escape_string($_POST['newgender']);
			$newcountry = $conn->real_escape_string($_POST['newcountry']);
			$newisadmin = $conn->real_escape_string($_POST['newisadmin']);

       		$newgroupid = $conn->real_escape_string($_POST['newgroup']);
       		$newpassword = md5($_POST['newpassword']);
			
       		$_SESSION['username'] = $username;
        	$update = "UPDATE members SET username = '$newusername', name = '$newlastname', firstname = '$newfirstname', email = '$newemail', phone = '$newphone', country = '$newcountry', password = '$newpassword', groupid = '$newgroupid', birthdate = '$newbirthdate', gender = '$newgender', isadmin = '$newisadmin' WHERE id='$id'";


        	if ($conn->query($update) === true) {
           		$_SESSION['message'] = "$username has been updated.";
				echo "<script>location.href = './index.php';</script>";
        	}
        	else {
           		$_SESSION['message'] = "$username could not be updated. Please contact your Support Team.";
        	}
        	mysqli_close($conn);

    	}
    	else {
        	$_SESSION['message'] = "The given passwords don't match with each other!";
    	}
	}
?>
</html>