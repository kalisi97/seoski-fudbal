<?php
    include("init.php");
    $poruka = '';
    if(isset($_POST["unesi"])){

        include("mecClass.php");
        $mec = new Mec($db);

        if($mec->izmeniNaziv()){
          $poruka = 'Uspesno izmenjen naziv tima';
        }else{
          $poruka = 'Greska pri izmeni';
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
					<h2 class="h-bold">Izmena naziva</h2>
					<div class="divider-header"></div>
					<p><?php
              echo($poruka);
          ?></p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		        <div class="container">


                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                          <form class="" method="post" action="">


                              <div class="form-group">
                                <label for="tim" class="cols-sm-2 control-label">Tim</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select id="tim" class="form-control" name="tim" >
                                      <?php
                                            $tim = $db->get('tim');
                                            foreach ($tim as $t ) {
                                              ?>
                                                <option value="<?php echo ($t['timID']); ?>"><?php echo ($t['nazivTima']); ?></option>
                                              <?php
                                            }
                                        ?>
                                    </select>
                                  </div>
                                </div>
                              </div>


                              <div class="form-group">
                                <label for="naziv" class="cols-sm-2 control-label">Naziv</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="naziv" id="naziv"  placeholder="Naziv"/>
                                  </div>
                                </div>
                              </div>



                              <div class="form-group ">
                                <button type="submit" name="unesi" id="button" class="btn btn-primary btn-lg btn-block login-button">Izmena naziva</button>
                              </div>

                            </form>
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
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/morphext.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
