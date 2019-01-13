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
		<!-- <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div> --><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Pelajaran</h1>
				
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action=<?php echo base_url()."admin/createPelajaran"?> method="post">
	      			<table border="0px" class="table-responsive">
	      				<tr>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>nama pelajaran</h4><input required type="text" class="form-control" name="txt_nama_pelajaran" id="idguru"size="40">
								    </div>

								  </div>
	      					</td>
	      					

	      				</tr>
	      				
	      				
	      			</table>
				  <div class="form-group"> 
				    <div class="col-sm-2">
				      <button type="submit" class="btn btn-success btn-lg btn-block">Tambah</button>
				    </div>
				  </div>
				</form>
			</div>
			
		</div><!--/.row-->
		
		
		
								
		
	</div>	<!--/.main-->

	