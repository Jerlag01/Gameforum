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
	
	$query1 = mysqli_query($conn, $countusers);
	if (! $query1) {
		die ('Could not fetch users: '. mysqli_error($conn));
	}
	while($row1 = mysqli_fetch_assoc($query1)) {
		$members = $row1['users'];
	}
	
	$query2 = mysqli_query($conn, $staff);
	if (! $query1) {
		die ('Could not fetch users: '. mysqli_error($conn));
	}
	while($row1 = mysqli_fetch_assoc($query2)) {
		$staffmembers = $row1['staff'];
	}
  ?>

  <title><?php echo $title ?> | Admin</title>

  <link rel="stylesheet" href="../css/reset.css">
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
										<a href="./list.php" class="nav-link active">
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
              							<li class="breadcrumb-item active">Index</li>
            						</ol>
        						</div>
        					</div>
      					</div>
    				</div>
	    			<div class="content">
    	  				<div class="container-fluid">
        					<div class="row">
          						<div class="col-lg-3 col-6">
            						<div class="small-box bg-info">
              							<div class="inner">
                							<h3><?php echo $staffmembers; ?></h3>
                							<p>Staff Members</p>
              							</div>
              							<div class="icon">
                							<i class="ion ion-person-stalker"></i>
              							</div>
              							<a href="./staff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            						</div>
          						</div>
	          					<div class="col-lg-3 col-6">
            						<div class="small-box bg-info">
              							<div class="inner">
                							<h3><?php echo $members;?></h3>
                							<p>Members</p>
              							</div>
              							<div class="icon">
                							<i class="ion ion-person"></i>
              							</div>
              							<a href="./index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            						</div>
          						</div>
        					</div>
      					</div>
						<div class="card">
    	    				<div class="card-header">
                           		<h3 class="card-title">Members</h3>
							</div>
                       			<div class="box-body table-responsive no-padding">
                           			<table id="users" class="table table-hover table-ordered table-striped">
                               			<thead>
                               				<tr>
                               					<th>ID</th>
                               					<th class="text-center">Email</th>
                                   				<th class="text-center">Username</th>
                                   				<th class="text-center">Firstname</th>
                                   				<th class="text-center">Name</th>
                                   				<th class="text-center">Group</th>
                                   				<th class="text-center">Registration Date</th>
												<th>Modfy User</th>
												<th>Remove User</th>
                                			</tr>
                                		</thead>
                                		<tbody>
                                			<?php
                                    			$list = mysqli_query($conn, $userlist);

                                    			if(! $list) {
                                       				die('Kon data niet inladen: '. mysqli_error($conn));
                                    			}

                                    			while($row3 = mysqli_fetch_assoc($list)) {
                                 			?>
                                       		<tr class="align-middle">
                                         		<td><code><?php echo htmlspecialchars($row3['id']);?></code></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['email']);?></a></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['username']);?></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['name']);?></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['firstname']);?></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['groupname']);?></td>
                                           		<td class="text-center"><?php echo htmlspecialchars($row3['registered']);?></td>
												<td>
													<form name="modifyuser" action="edit.php" method="get">
														<input type="hidden" name="id" value="<?php echo htmlspecialchars($row3['id']); ?>" />
														<input type="submit" value="Modify User" />
													</form>
												</td>
												<td>
													<form name="deleteuser" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
														<input type="hidden" name="deleteuser" value="<?php echo htmlspecialchars($row3['id']); ?>" />
														<input type="submit" name="deleteuser" value="Delete User" />
													</form>
												</td>
                                        	</tr>
                                			<?php    }
                                			?>
                                		</tbody>
										<tfoot>
											<tr>
                                    			<th>ID</th>
                                    			<th class="text-center">Email</th>
                                    			<th class="text-center">Username</th>
                                    			<th class="text-center">Firstname</th>
                                    			<th class="text-center">Name</th>
                                    			<th class="text-center">Group</th>
                                    			<th class="text-center">Registration Date</th>
												<th>Modfy User</th>
												<th>Remove User</th>
                                			</tr>
										</tfoot>
                            		</table>
                        		</div>
							</div>
                        	<div class="box-footer with-border">
                            	<div class="col-md-12 text-center"></div>
								<?php echo $_SESSION['message'];?>
                        	</div>
                    	</div>
    				</div>
  				</div>
  				<footer class="main-footer">
    				<?php include('../required/footer.php');?>
				</footer>
			</div>
		<?php
			include('../required/connection.php');
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$userid = $conn->real_escape_string($_POST['deleteuser']);
				$deleteuser = "DELETE FROM users where id = $userid";
		
				if ($conn->query($deleteuser) === true) {
					$_SESSION['message'] = "User has been removed.";
					echo "<script>location.href = './list.php';</script>";
				}
				else {
					$_SESSION['message'] = "User couldn't be removed";
				}
			}
		?>

		<script src="../plugins/jquery/jquery.min.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../dist/js/adminlte.min.js"></script>
	</body>
</html>