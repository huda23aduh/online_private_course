<?php
			if (isset($this->session->userdata['logged_in'])) {
				$nama = ($this->session->userdata['logged_in']['nama']);
				$idmurid = ($this->session->userdata['logged_in']['idmurid']);
				$password = ($this->session->userdata['logged_in']['password']);



			} else {
				//header("location: admin");
				redirect(base_url('guru/login'));
			}
		?>			
			<li ><a href=<?php echo base_url()."murid/home"; ?>> <img style="height: 30px;width:30px;" src=<?php echo public_url()."images/dashboard.png" ?> /> Dashboard</a></li>
			<li><a href=<?php echo base_url()."murid/new_booking"; ?> ><img style="height: 30px;width:30px;" src=<?php echo public_url()."images/venue_logo.png" ?> /> Buat Booking Les Privat</a></li>
			<li><a href=<?php echo base_url()."murid/list_les_privat/".$idmurid; ?> ><img style="height: 30px;width:30px;" src=<?php echo public_url()."images/venue_logo.png" ?> /> List Les Privat</a></li>
			