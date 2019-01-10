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
			$nama = ($this->session->userdata['logged_in']['nama']);
			$idmurid = ($this->session->userdata['logged_in']['idmurid']);
			$password = ($this->session->userdata['logged_in']['password']);

			
		} else {
			//header("location: admin");
			redirect(base_url('murid/login'));
		}
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header" >
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=<?php echo base_url()."murid/home"; ?> ><span>LES PRIVAT ONLINE</span> SEBAGAI MURID</a>
				<ul class="user-menu">

					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $idmurid.'_'.$nama;  ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li> -->
							<li><a href=<?php echo base_url()."murid/logout" ?> ><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>

					

					<li class="dropdown pull-right"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" style="margin-right:20px;">
						<em class="fa fa-bell"></em><span class="label label-info" id="total_unopened">X</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts" id="ul_notif">
							<li id="li_notif"><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<!-- <li class="divider"></li> -->
							<!-- <li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li> -->
						</ul>
					</li>

					<li class="dropdown pull-right" style="margin-right:20px;">

						<span id="refresh_btn" > <img src=<?php echo public_url(). "images/refresh_icon.png"; ?> alt="Smiley face" height="20" width="20"></span>
					</li>
					

				</ul>
			</div>
							
		</div><!-- /.container-fluid -->

		
	</nav>
		
	
		
	

	
