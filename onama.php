i<?php
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
					<h2 class="h-bold">Nesto o nama</h2>
					<div class="divider-header"></div>
					<p>Ko smo mi? </p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		        <div class="container">


                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                            <h2 class="text-center">Nasa liga</h2>
                            <p class="text-center">Zene fudbalera koje zele da vide svoje muzeve zive i zdrave posle utakmica.</p>
                        </div>
		              </div>
		        </div>
            <div class="row">
                <div class="col-md-4">
                    <h1>Katarina Simic</h1>
                    <img src="assets/katarina.jpg" class="img img-thumbnail">
                    <p>Ona svog Urosa zeli da zastiti najvise na svetu. Posle svake utakmice u beton ligi sledi makar dva piva.</p>
                </div>
                <div class="col-md-4">
                    <h1>Andjelija Skobelev</h1>
                    <img src="assets/andjelija.jpg" class="img img-thumbnail">
                    <p>Zastitnica Srbstva, a samim tim i srbskog fudbala, uvek navija da vidi nekog dobrog fudbalera deliju</p>
                </div>
                <div class="col-md-4">
                    <h1>Kristina Smiljanic</h1>
                    <img src="assets/kristina.jpg" class="img img-thumbnail">
                    <p>Aktivno trazi decka fudbalera</p>
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
	<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
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
    <script src="contactform/contactform.js"></script>

</body>

</html>
