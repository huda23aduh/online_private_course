	
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
				<h1 class="page-header">Edit Guru</h1>
				
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action=<?php echo base_url()."admin/editGuru"?> method="post">
	      			<table border="0px" class="table-responsive">
	      					<?php
						    	if($var_guru != null){

						    		foreach ($var_guru as $value) {
										?>

										<tr>

											<td>
					      						<div class="form-group">
												    <div class="col-sm-10">
												      <h4>kode guru</h4><input readonly type="text" class="form-control" value=<?php echo $value->kode_guru ?> name="txt_kode_guru" size="40">
												    </div>

												  </div>
					      					</td>

					      				</tr>

					      				<tr>

											<td>
					      						<div class="form-group">
												    <div class="col-sm-10">
												      <h4>nama guru</h4><input  type="text" class="form-control" value=<?php echo $value->nama ?> name="txt_nama_guru" size="40">
												    </div>

												  </div>
					      					</td>

					      				</tr>

					      				<tr>

											<td>
					      						<div class="form-group">
												    <div class="col-sm-10">
												      <h4>email</h4><input type="text" class="form-control" value=<?php echo $value->email; ?> name="txt_email_guru" size="40">
												    </div>

												  </div>
					      					</td>

					      				</tr>

					      				<tr>

											<td>
					      						<div class="form-group">
												    <div class="col-sm-10">
												      <h4>telepon</h4><input type="text" class="form-control" value=<?php echo $value->telepon ?> name="txt_telepon_guru" size="40">
												    </div>

												  </div>
					      					</td>

					      				</tr>


					      				<tr>

											<td>
					      						<div class="form-group">
												    <div class="col-sm-10">
												      <h4>alamat</h4><textarea style="width: 100%" class="form-control" id="alamat" name="txt_alamat_guru" rows="3"><?php echo $value->alamat ?></textarea>
												    </div>

												  </div>
					      					</td>

					      				</tr>


										<?php

									}
						    	}
								
							?>
	      				
	      				
	      			</table>
				  <div class="form-group"> 
				    <div class="col-sm-2">
				      <button type="submit" class="btn btn-success btn-lg btn-block">Edit</button>
				    </div>
				  </div>
				</form>
			</div>
			
		</div><!--/.row-->
		
		
		
								
		
	</div>	<!--/.main-->

	