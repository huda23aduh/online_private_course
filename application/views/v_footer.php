<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; LES PRIVAT ONLINE</p>
        <center></center>
      </div>
      <!-- /.container -->



    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src=<?php echo public_url()."vendor/jquery/jquery.min.js" ?> > </script>
    <script src=<?php echo public_url()."vendor/bootstrap/js/bootstrap.bundle.min.js" ?> > </script>

    <!-- Plugin JavaScript -->
    <script src=<?php echo public_url()."vendor/jquery-easing/jquery.easing.min.js" ?> > </script>

    <!-- Custom JavaScript for this theme -->
    <script src=<?php echo public_url(). "js/scrolling-nav.js" ?> ></script>


    <script type="text/javascript">

      

        $('.list-group-item').click(function() {
            var region = $(this).attr('data-region');
            
            $('.list-group-item').css({'background-color':'transparent','color':'#467FD9'});
            $(this).css({'background-color':'#f00','color':'#fff'});

            var str = $(this).first("p").text();
            $('input[name="nama_kategori"]').val(str);

             var aa = $(this).text();

             console.log(aa);
            
            // $('.textzone:visible').stop().fadeOut(500, function () {
            //     $('#' + region).fadeIn(500);
            // });

            return false;
            
        });



    </script>

  </body>

</html>