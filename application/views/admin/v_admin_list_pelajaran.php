		
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
				<h1 class="page-header">List Pelajaran</h1>
				
			</div>
		</div><!--/.row-->
		

		
		<div class="row" >
			<div class="col-lg-12" style="background-color:#c2c2a3;">
				<br>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">nama_pelajaran</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    	
				    	<?php
					    	if($all_pelajaran != null){

					    		foreach ($all_pelajaran as $value) {
									echo"<tr>";
									echo "<td>".$value->idpelajaran."</td>";
									echo "<td>".$value->nama_pelajaran."</td>";
									echo "<td> <a href=edit_pelajaran/".$value->idpelajaran.">edit</a>  | <a href=hapusPelajaran/".$value->idpelajaran.">hapus</a></td>";

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

	