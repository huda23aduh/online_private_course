<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Dashboard</title>

<link href=<?php echo public_url(). "admin_template/css/bootstrap.min.css"; ?>  rel="stylesheet">
<link href=<?php echo public_url(). "admin_template/css/datepicker3.css"; ?>  rel="stylesheet">
<link href=<?php echo public_url(). "admin_template/css/styles.css"; ?>   rel="stylesheet">

<!--Icons-->
<script src=<?php echo public_url(). "admin_template/js/lumino.glyphs.js"; ?> ></script>

<!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<style type="text/css">
	button {
	    display: inline-block;
	    padding: 0;
	    margin: 0;
	    vertical-align: top;
	}
	input[type=text]:focus {
	    background-color: lightblue;
	}
	
</style>

</head>

<body>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			$email = ($this->session->userdata['logged_in']['email']);
			$idadmin = ($this->session->userdata['logged_in']['idadmin']);
			$password = ($this->session->userdata['logged_in']['password']);

			

		} else {
			//header("location: admin");
			redirect(base_url('admin/login'));
		}
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=<?php echo base_url()."admin/home"; ?>><span>LES PRIVAT ONLINE </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $email;  ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li> -->
							<li><a href=<?php echo base_url()."admin/logout" ?> ><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	
		
	

	
