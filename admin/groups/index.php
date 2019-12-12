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
	
	$query1 = mysqli_query($conn, $countgroups);
	if (! $query1) {
		die ('Could not fetch users: '. mysqli_error($conn));
	}
	while($row1 = mysqli_fetch_assoc($query1)) {
		$count = $row1['groups'];
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
            			<li class="nav-item has-treeview menu-closed">
                			<a href="#" class="nav-link">
                  				<i class="nav-icon fas fa-users-cog"></i>
                  				<p>User Management</p>
                				<i class="right fas fa-angle-left"></i>
                			</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../users/" class="nav-link">
										<i class="fas fa-users nav-icon"></i>
										<p>List All Users</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../users/staff.php" class="nav-link">
										<i class="fas fa-users nav-icon"></i>
										<p>List Staff Users</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../users/list.php" class="nav-link">
										<i class="fas fa-user-plus nav-icon"></i>
										<p>List Members</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../users/create.php" class="nav-link">
										<i class="fas fa-user-plus nav-icon"></i>
										<p>Add User</p>
									</a>
								</li>
							</ul>
              			</li>
              			<li class="nav nav-treeview">
							<li class="nav-item">
                				<a href="./" class="nav-link active">
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
                				<a href="../games/" class="nav-link">
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
         					<h1 class="m-0 text-dark">Group Management</h1>
          					</div>
          					<div class="col-sm-6">
            					<ol class="breadcrumb float-sm-right">
              						<li class="breadcrumb-item">Groups</li>
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
                						<h3><?php echo $count; ?></h3>
                						<p>Group(s)</p>
              						</div>
              						<div class="icon">
                						<i class="fas fa-user-circle"></i>
              						</div>
              						<a href="./" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            					</div>
          					</div>
        				</div>
      				</div>
					
					<div class="card">
    	    			<div class="card-header">
                           	<h3 class="card-title">Groups</h3>
						</div>
                       	<div class="box-body table-responsive no-padding">
                        	<table id="users" class="table table-hover table-ordered table-striped">
                            	<thead>
                            		<tr>
                            			<th>ID</th>
                            			<th class="text-center">Group Name</th>
										<th>Remove Group</th>
                                	</tr>
                                </thead>
                                <tbody>
                                	<?php
                                   		$list = mysqli_query($conn, $groups);

                                   		if(! $list) {
                                   			die('Could not fetch data: '. mysqli_error($conn));
                                   		}

                                   		while($row2 = mysqli_fetch_assoc($list)) {
                                	?>
                                   	<tr class="align-middle">
                                       	<td><code><?php echo htmlspecialchars($row2['idgroups']);?></code></td>
										<td class="text-center"><?php  echo htmlspecialchars($row2['groupname']); ?></td>
										<td>
											<form name="deletegroup" action="./index.php" method="post">
												<input type="hidden" name="removegroup" value="<?php echo htmlspecialchars($row2['idgroups']); ?>" />
												<input type="submit" name="deletegroup" value="Delete Group" />
											</form>
										</td>
                                	</tr>
                                	<?php    }
                                	?>
                                </tbody>
								<tfoot>
									<tr>
                                   		<th>ID</th>
                                   		<th class="text-center">Group Name</th>
										<th>Remove Group</th>
                                	</tr>
								</tfoot>
                            </table>
                        </div>
					</div>
					<div class="card">
						<div class="card card-default">
    	    				<div class="card-header">
                       			<h3 class="card-title">Add Group</h3>
							</div>
							<div class="card-body">
            					<div>
									<div class="form-group">
                						<form name="makegroup" action="./index.php" method="post">
                                            <div class="card card-primary">
                                                <div class="card-body">
													<div class="form-group">
                           								<div>
                                                            <label for="addgroup" class="control-label">Group Name</label>
                               								<input type="text" autocomplete="off" name="addgroup" placeholder="Group name" class="form-control" required/>
                           								</div>
													</div>
                           						</div>
                                            </div>
                           					<div class="card-footer">
												<button type="submit" name="makegroup" class="btn btn-success btn-sm">Add Group</button>
                           					</div>
                						</form>
            						</div>
        						</div>
							</div>
						</div>	
  					</div>
				</div>						
                <div class="box-footer with-border">
                   	<div class="col-md-12 text-center"></div>
						<?php echo $_SESSION['message'];?>
                   	</div>
                </div>
  				<footer class="main-footer">
    				<?php include('../required/footer.php');?>
				</footer>
			</div>
			<?php
				if (isset($_POST['makegroup'])) {
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$groupname = $conn->real_escape_string($_POST['addgroup']);
						$creategroup = "INSERT INTO groups (groupname) VALUES ('".$groupname."')";

						if ($conn->query($creategroup) === true) {
							$_SESSION['message'] = "$groupname has been added.";
							echo "<script>location.href = './index.php';</script>";
						}
						else {
							$_SESSION['message'] = "$groupname could not be added. Contact your Support Team.";
						}
					}
				}

				if (isset($_POST['deletegroup'])) {
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$groupid = $conn->real_escape_string($_POST['removegroup']);
						$deletegroup = "DELETE FROM groups where idgroups = $groupid";
		
						if ($conn->query($deletegroup) === true) {
							$_SESSION['message'] = "Group has been removed.";
							echo "<script>location.href = './index.php';</script>";
						}
						else {
							$_SESSION['message'] = "Group couldn't be removed";
						}
					}
				}
			?>
		<script src="../plugins/jquery/jquery.min.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../dist/js/adminlte.min.js"></script>
	</body>
</html>