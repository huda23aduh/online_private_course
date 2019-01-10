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
			<?php include 'v_guru_sidebar_item.php';?>	
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
				      <th scope="col">telepon murid</th>
				      <th scope="col">Status</th>
				      <!-- <th scope="col">Action</th> -->
				    </tr>
				  </thead>
				  <tbody>
				    	
				    	<?php
				    		$ket_stat = "";
							foreach ($all_les_privat_guru as $value) {
								if($value->status_les_idstatus_les == '1')
									$ket_stat = "akan berlangsung";
								echo"<tr>";
								echo "<td>".$value->idles."</td>";
								echo "<td>".$value->waktu_mulai."</td>";
								echo "<td>".$value->tanggal_les."</td>";
								echo "<td>".$value->durasi_jam."</td>";
								echo "<td>".$value->tarif."</td>";
								echo "<td>".$value->alamat_les."</td>";
								echo "<td>".$value->nama_pelajaran."</td>";
								echo "<td>".$value->telepon_murid."</td>";
								echo "<td>".$ket_stat."</td>";
								//echo "<td> edit    delete </td>";
								echo "</tr>";
							}
						?>

				  </tbody>
				</table>

				<table border="double">

					


				</table>

			</div>
		</div><!--/.row-->
		
		<div class="row">
			<!-- <div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Orders</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Comments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Users</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Visitors</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
						</div>
					</div>
				</div>
			</div> -->
		</div><!--/.row-->
								
		<div class="row">
			<div class="col-md-8">
			
				<!-- <div class="panel panel-default chat">
					<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Chat</div>
					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies. 
									</p>
								</div>
							</li>
							<li class="right clearfix">
								<span class="chat-img pull-right">
									<img src="http://placehold.it/80/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small>
									</div>
									<p>
										Mauris dignissim porta enim, sed commodo sem blandit non. Ut scelerisque sapien eu mauris faucibus ultrices. Nulla ac odio nisl. Proin est metus, interdum scelerisque quam eu, eleifend pretium nunc. Suspendisse finibus auctor lectus, eu interdum sapien.
									</p>
								</div>
							</li>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies. 
									</p>
								</div>
							</li>
						</ul>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." />
							<span class="input-group-btn">
								<button class="btn btn-success btn-md" id="btn-chat">Send</button>
							</span>
						</div>
					</div>
				</div> -->
				
			</div><!--/.col-->
			
			<div class="col-md-4">
			
				<!-- <div class="panel panel-blue">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>To-do List</div>
					<div class="panel-body">
						<ul class="todo-list">
						<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Make a plan for today</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Update Basecamp</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Send email to Jane</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Drink coffee</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Do some work</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Tidy up workspace</label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
									<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								</div>
							</li>
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" />
							<span class="input-group-btn">
								<button class="btn btn-primary btn-md" id="btn-todo">Add</button>
							</span>
						</div>
					</div>
				</div> -->
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

	