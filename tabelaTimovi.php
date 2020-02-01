<?php
    include("init.php");
    $orderBy = '';

    if(isset($_GET['sort'])){
      if($_GET['sort']=='r'){
        $orderBy = ' order by t.brojIgraca asc';
      }
      if($_GET['sort']=='o'){
        $orderBy = ' order by t.brojIgraca desc';
      }
    }
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
                  				    <div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.5s">
                                  <table class="table table-hover" >
                                    <thead>
                                      <tr >
                                        <th class="text-center">Redni broj</th>
                                        <th class="text-center">Naziv tima</th>
                                        <th class="text-center">Meceva ukupno</th>
                                        <th class="text-center">Pobeda</th>
                                        <th class="text-center">Nereseno</th>
                                        <th class="text-center">Poraza</th>
                                        <th class="text-center">Golova datih</th>
                                        <th class="text-center">Golova primljenih</th>
                                        <th class="text-center">Gol razlika</th>
                                        <th class="text-center">Poena</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $timovi = $db->rawQuery("select *,(m.golovaDatih - m.golovaPrimljenih) as golRazlika from tabela m join tim t on m.timID=t.timID join grad g on t.gradID=g.id order by m.brojPoena desc");
                                          $brojac = 0;
                                          foreach ($timovi as $tim) {
                                            $brojac++;
                                            ?>
                                                <tr>
                                                    <td><?php echo($brojac); ?></td>
                                                    <td><?php echo($tim["nazivTima"]); ?></td>
                                                    <td><?php echo($tim["ukupnoUtakmica"]); ?></td>
                                                    <td><?php echo($tim["pobeda"]); ?></td>
                                                    <td><?php echo($tim["nereseno"]); ?></td>
                                                    <td><?php echo($tim["poraza"]); ?></td>
                                                    <td><?php echo($tim["golovaDatih"]); ?></td>
                                                    <td><?php echo($tim["golovaPrimljenih"]); ?></td>
                                                    <td><?php echo($tim["golRazlika"]); ?></td>
                                                    <td><?php echo($tim["brojPoena"]); ?></td>
                                                </tr>
                                            <?php
                                          }
                                       ?>
                                    </tbody>
                                  </table>
                              </div>
                        </div>

		              </div>
		        </div>
		</div>
	</section>



<?php
  include("footer.php");
  ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/slippry.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/morphext.min.js"></script>
	<script src="js/gmap.js"></script>
	<script src="js/jquery.mb.YTPlayer.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
