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
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                          Sortiranje po broju igraca:
                            <a href="index.php?sort=r"><i class="fa fa-arrow-up"></i></a>
                            <a href="index.php?sort=o"><i class="fa fa-arrow-down"></i></a>
                        </div>

                  			<div class="col-xs-12 col-sm-12 col-md-12">
                  				    <div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.5s">
                                  <table id="tabelaa" class="table table-hover" >
                                    <thead>
                                      <tr >
                                        <th class="text-center">Redni broj</th>
                                        <th class="text-center">Naziv tima</th>
                                        <th class="text-center">Broj igraca</th>
                                        <th class="text-center">Grad</th>
                                        <th class="text-center">Grb</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $timovi = $db->rawQuery("select * from tim t join grad g on t.gradID=g.id".$orderBy);
                                          $brojac = 0;
                                          foreach ($timovi as $tim) {
                                            $brojac++;
                                            ?>
                                                <tr>
                                                    <td class="col-md-1"><?php echo($brojac); ?></td>
                                                    <td class="col-md-4"><?php echo($tim["nazivTima"]); ?></td>
                                                    <td class="col-md-2"><?php echo($tim["brojIgraca"] ); ?></td>
                                                    <td class="col-md-4"><?php echo($tim["naziv"]); ?></td>
                                                    <td class="col-md-1"><img src="grbovi/<?php echo($tim["grb"]); ?>" width="10px" height="100px"></td>
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
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/datatabele.js"></script>
</body>
<script>

$(document).ready(function(){
    $('#tabelaa').DataTable();
});
</script>
</html>
