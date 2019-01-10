		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:#999966;">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<?php include 'v_murid_sidebar_item.php';?>	
			<!-- <li><a href="forms.html"><svg clearfixass="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Sto</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
			<!-- <li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li> -->
			<!-- <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li> -->
		</ul>
		

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		

		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Les Privat</h1>
				
			</div>
		</div><!--/.row-->
		

		
		<div class="row" >
			<div class="col-lg-12" style="background-color:#c2c2a3;">
				<br>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">waktu_mulai</th>
				      <th scope="col">tanggal</th>
				      <th scope="col">durasi</th>
				      <th scope="col">tarif</th>
				      <th scope="col">alamat</th>
				      <th scope="col">pelajaran</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    	
				    	<?php
					    	if($all_les_privat_murid != null){

					    		foreach ($all_les_privat_murid as $value) {
									echo"<tr>";
									echo "<td>".$value->idles."</td>";
									echo "<td>".$value->waktu_mulai."</td>";
									echo "<td>".$value->tanggal_les."</td>";
									echo "<td>".$value->durasi_jam."</td>";
									echo "<td>".$value->tarif."</td>";
									echo "<td>".$value->alamat_les."</td>";
									echo "<td>".$value->nama_pelajaran."</td>";
									echo "<td>".$value->status_les."</td>";
									if($value->status_les == "sedang mencari guru")
										echo "<td> <a href=".base_url()."les/cancel_les/".$value->idles.">batalkan</a>  </td>";
									else 
										echo "<td> - </td>";
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

	