		<?php
		if (isset($this->session->userdata['logged_in'])) {
			$nama = ($this->session->userdata['logged_in']['nama']);
			$idguru = ($this->session->userdata['logged_in']['idguru']);
			$password = ($this->session->userdata['logged_in']['password']);



		} else {
			//header("location: admin");
			redirect(base_url('guru/login'));
		}
	?>


	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<?php include 'v_admin_sidebar_item.php';?>	
		</ul>
		

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		

		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">TAMBAH MURID BARU</h1>
			</div>
		</div><!--/.row-->
		

		
		<div class="row" >
			<div class="col-lg-12" style="background-color:#c2c2a3;">

	      	<br>


	      		<form class="form-horizontal" action=<?php echo base_url()."admin/createMurid"?> method="post">
	      			<table border="0px" class="table-responsive">
	      				<tr>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Nama</h4><input type="text" class="form-control" id="nama" placeholder="nama" name="txt_nama" size="40">
								    </div>

								  </div>
	      					</td>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Email</h4><input type="email" class="form-control" id="email" placeholder="Email" name="txt_email" size="40">
								    </div>

								  </div>
	      					</td>
	      				</tr>
	      				<tr>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Telepon</h4><input type="text" class="form-control" id="text" placeholder="Telp" name="txt_telepon" size="40">
								    </div>

								  </div>
	      					</td>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Password</h4><input type="password" class="form-control" id="password" placeholder="Enter password" name="txt_password" size="40">
								    </div>

								  </div>
	      					</td>
	      				</tr>
	      				<tr>
	      					<td colspan="2">
	      						<div class="form-group">
								    <div class="col-sm-11"> 
								      <h4>Alamat</h4><textarea style="width: 100%" class="form-control" id="alamat" name="txt_alamat" rows="3"></textarea>
								    </div>
								  </div>
	      					</td>
	      				</tr>


	      			</table>
				  
				  <div class="form-group"> 
				    <div class="col-sm-7">
				      <button type="submit" class="btn btn-success btn-lg btn-block">Tambah Murid</button>
				    </div>
				  </div>
				</form>



			</div>
		</div><!--/.row-->
		
		
								
		

	</div>	<!--/.main-->

	


	