		
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
				<h1 class="page-header">List Murid</h1>
				
			</div>
		</div><!--/.row-->
		

		
		<div class="row" >
			<div class="col-lg-12" style="background-color:#c2c2a3;">
				<br>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">kode_murid</th>
				      <th scope="col">nama</th>
				      <th scope="col">telepon</th>
				      <th scope="col">email</th>
				      <th scope="col">alamat</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    	
				    	<?php
					    	if($all_murid != null){

					    		foreach ($all_murid as $value) {
									echo"<tr>";
									echo "<td>".$value->idmurid."</td>";
									echo "<td>".$value->kode_murid."</td>";
									echo "<td>".$value->nama."</td>";
									echo "<td>".$value->telepon."</td>";
									echo "<td>".$value->email."</td>";
									echo "<td>".$value->alamat."</td>";
									echo "<td> <a href=edit_murid/".$value->kode_murid.">edit</a>  | <a href=hapusMurid/".$value->kode_murid.">hapus</a></td>";

									echo "</tr>";
								}
					    	}
							
						?>

				  </tbody>
				</table>

				<table border="double">

					


				</table>

			</div>
		</div><!--/.row-->
		
		

								
	</div>	<!--/.main-->

	