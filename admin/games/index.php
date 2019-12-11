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
	include ('./steamapi.php');
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
                				<a href="./" class="nav-link active">
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
         					<h1 class="m-0 text-dark">Games</h1>
          					</div>
          					<div class="col-sm-6">
            					<ol class="breadcrumb float-sm-right">
              						<li class="breadcrumb-item active">Games</li>
            					</ol>
        					</div>
        				</div>
      				</div>
    			</div>

    			<div class="content"> 
					<?php 
					$result = [];
					foreach ($json as $item) {
						array_push($result, [
							'ID' => $item->applist->apps->appid,
							'Name' => $item->applist->apps->name
						]);
					}
					?>
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
		<script src="../plugins/jquery/jquery.min.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../dist/js/adminlte.min.js"></script>
	</body>
</html>