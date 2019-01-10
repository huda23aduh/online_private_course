	<?php error_reporting(E_ALL & ~E_NOTICE); ?> 

	<!-- <div class="homepage-content img-one">
	  <div class="hidden-content">
	    <h1> For Guests </h1>
	    <p>Usdaerum explaudae officto commossum seque delitiae. Rate conempo rectio ius ium- quun tinullaborum dentiunt. Tem in re occatem poreperum aut faciae escia dolute pore pro volo ex etur? Offictet doluptas aruptam eos qui temossimet voloria tes- tiam
	      reium harum sum</p>
	  </div>
	</div> -->

	<!-- <header class="bg-primary text-white" >
      <div class="container text-center"  > -->
    <header class="homepage-content img-one" >
    	<div class="container text-center"  >
	    	<h1>DAFTAR SEBAGAI GURU</h1>
	        <!-- <p class="lead">DESKRIPSI WEBSITE</p> -->
	        
			

			
	      	<br>
	      	<center>

	      	<div class="col-md-8 col-md-offset-8">

	      		<form class="form-horizontal" action=<?php echo base_url()."guru/create"?> method="post">
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
				    <div class="col-md-8 col-md-offset-8">
				      <button type="submit" class="btn btn-success btn-lg btn-block">Daftar Sebagai Guru</button>
				    </div>
				  </div>
				</form>


	      	</div>
	      </center>
	      	


  		</div>

    

    </header>