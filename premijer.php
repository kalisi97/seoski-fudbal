<?php
    include("init.php");

 ?>

<!DOCTYPE html>
<html lang="en">

<?php
    include("header.php");
 ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">




  <?php
      include("meni.php");
   ?>

	<!-- Section: about -->
    <section id="about" class="home-section color-dark bg-white">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Timovi</h2>
					<div class="divider-header"></div>
					<p>Lista svih timova</p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		        <div class="container">


                <div class="row">

                  			<div class="col-xs-12 col-sm-12 col-md-12">
                  				    <div id="tabela" class="team-wrapper-big wow bounceInUp" data-wow-delay="0.5s">

                              </div>
                        </div>

		              </div>
		        </div>
		</div>
	</section>
	<!-- /Section: about -->

	<!-- Section: parallax 1 -->


<?php
  include("footer.php");
  ?>


    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/slippry.min.js"></script>
	<script src="js/morphext.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>

    <script>

        function popuniTabelu(){

          $.ajax({
            url: "https://raw.githubusercontent.com/opendatajson/football.json/master/2015-16/en.1.clubs.json",

            success: function(result){
              var text = '<h1> Liga : '+$.parseJSON(result).name+' </h1>'
            text += '<table class="table table-hover"><thead><tr><th>Ime</th><th>Skraceno</th></tr></thead><tbody>';
            $.each($.parseJSON(result).clubs, function(i, val) {
              text += '<tr>';
              text += '<td>'+val.name+'</td>';
              text += '<td>'+val.code+'</td>';
              text += '</tr>';

              });

              text+='</tbody></table>';
              $('#tabela').html(text);
          },
        error: function(result){
          console.log(result);
        }});
        }

    </script>
    <script>
        $( document ).ready(function() {
          popuniTabelu();
        });
    </script>

</body>

</html>
