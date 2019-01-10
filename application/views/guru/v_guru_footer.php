
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



	<script src=<?php echo public_url(). "admin_template/js/jquery-1.11.1.min.js"; ?> src="js/jquery-1.11.1.min.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/bootstrap.min.js"; ?> src="js/bootstrap.min.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/chart.min.js"; ?> src="js/chart.min.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/chart-data.js"; ?> src="js/chart-data.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/easypiechart.js"; ?> src="js/easypiechart.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/easypiechart-data.js"; ?> src="js/easypiechart-data.js"></script>
	<script src=<?php echo public_url(). "admin_template/js/bootstrap-datepicker.js"; ?> src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	

	<script type="text/javascript">

		 $(document).ready(function() {
		 	refresh_notif();

		    $("#refresh_btn").click(function() {  
		    	$('#ul_notif').empty();           

			    $.ajax({    //create an ajax request to display.php
			        type: "GET",
			        url: <?php echo '"'.base_url().'guru_notification/getTotalUnOpenedNotifDataByIdguru/'.$idguru.'"'; ?> ,             
			        dataType: "html",   //expect html to be returned                
			        success: function(response){  
			        	var d = JSON.parse(response);
			        	//console.log(d.details);

			        	var details_notif = d.details;
			        	
			        	for (var i in details_notif) {
			        		$('#ul_notif').append('<li><a href=google.com> <div><em class=fa fa-envelope></em>'  + d.details[i].idnotification + d.details[i].information +
			        			'</div></a></li><li class=divider></li>');
						}
						$('#ul_notif').append('<li><a href=google.com> <div><em class=fa fa-envelope></em>'  + '</div></a></li><li class=divider></li>');

			        	$('#total_unopened').text(d.total_count.total);        

			        }

			    });
			});
		});

		function refresh_notif(){

			$('#ul_notif').empty();

			$.ajax({    
				type: "GET",
			    url: <?php echo '"'.base_url().'guru_notification/getTotalUnOpenedNotifDataByIdguru/'.$idguru.'"'; ?> ,             
			    dataType: "html",   //expect html to be returned                
			    success: function(response){  
			    	var d = JSON.parse(response);
			        //console.log(d.details);

			        var details_notif = d.details;
			        	
			        for (var i in details_notif) {
			        	$('#ul_notif').append('<li><a href=google.com> <div><em class=fa fa-envelope></em>' + 'id les = ' + d.details[i].information +
			        	'</div></a></li><li class=divider></li>');
			        	//console.log("Company Name "  + i + ' = ' + d.details[i].murid_idmurid);
					}
					$('#ul_notif').append('<li><a href=list_les_privat> <div><em class=fa fa-envelope></em>' + '-- LIHAT SEMUA --' + '</div></a></li><li class=divider></li>');

					$('#total_unopened').text(d.total_count.total);
					                   

			    }

			    });
		}

	</script>

</body>

</html>