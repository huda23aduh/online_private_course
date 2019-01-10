	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:#999966;">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<?php include 'v_murid_sidebar_item.php';?>	
			
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
				<h1 class="page-header">Buat Booking Les Privat</h1>
				<?php
					if (isset($this->session->userdata['logged_in'])) {
						$username = ($this->session->userdata['logged_in']['username']);
						$idmurid = ($this->session->userdata['logged_in']['idmurid']);
						$password = ($this->session->userdata['logged_in']['password']);

						
					}
					
				?>
			</div>
		</div><!--/.row-->
		

		
		<div class="row" style="background-color:#c2c2a3;">
			<div class="col-lg-12">
				<form class="form-horizontal" action=<?php echo base_url()."les/new_booking_process"?> method="post">
	      			<table border="0px" class="table-responsive">
	      				<tr>
	      					<td colspan="2">
	      						<div class="form-group">
								    <div class="col-sm-11"> 
								      <h4>Id Murid</h4><input type="text" class="form-control" id="idmurid" value=<?php echo $idmurid; ?> name="idmurid" size="40" readonly>
								    </div>
								  </div>
	      					</td>
	      				</tr>
	      				<tr>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Tanggal</h4><input type="date" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" size="40">
								    </div>

								  </div>
	      					</td>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Waktu Mulai</h4><input type="time" class="form-control" id="waktu_mulai" placeholder="waktu_mulai" name="waktu_mulai" size="40">
								    </div>

								  </div>
	      					</td>
	      				</tr>
	      				<tr>
	      					<td>
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Durasi (Jam)</h4>
								      <select class="custom-select" id="durasi" name="durasi">
									    <option selected>1</option>
									    <option value="2">2</option>
									    <option value="3">3</option>

									  </select>
								    </div>

								  </div>
	      					</td>
	      					<td>
								<div class="form-group">
								  <div class="col-sm-10">
								      <h4>Pelajaran</h4>
								      <select class="custom-select" id="idpelajaran" name="idpelajaran">
								      	<?php

								      		foreach ($all_pelajaran as $value) {
								      			echo "<option value='".$value->idpelajaran."''>".$value->nama_pelajaran."</option>";
											}

								      	?>


									  </select>
								    </div>
								</div>
	      					</td>
	      				</tr>
	      				<tr>

	      					<td >
	      						<div class="form-group">
								    <div class="col-sm-10">
								      <h4>Tarif</h4><input type="number" class="form-control" id="tarif" placeholder="tarif" name="tarif" size="40" readonly>
								    </div>

								  </div>
	      					</td>
	      				</tr>
	      				<tr>
	      					<td colspan="2">
	      						<div class="form-group">
								    <div class="col-sm-11"> 
								      <h4>Alamat</h4><textarea style="width: 100%" class="form-control" id="alamat" name="alamat" rows="3"></textarea>
								    </div>
								  </div>
	      					</td>
	      				</tr>

	      				<tr>
	      					<td colspan="2">
	      						<div class="form-group">
								    <div class="col-sm-11"> 
								    	<h4>Keterangan Pelajaran</h4><textarea style="width: 100%" class="form-control" id="ket_pelajaran" name="ket_pelajaran" rows="3" placeholder="Contoh : Kelas 2 SMP - Bab 3 Matriks"></textarea>
								    	
								    </div>

								</div>
	      					</td>
	      				</tr>


	      			</table>
				  
				  <div class="form-group"> 
				  	<div class="col-sm-4">
				      <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
				    </div>
				  </div>
				</form>

			</div>
		</div><!--/.row-->
		
								
		
	</div>	<!--/.main-->

	