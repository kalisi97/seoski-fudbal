<?php
    include("init.php");

    if(empty($_SESSION['user'])){
      header('Location:index.php');
    }else{
      if($_SESSION['user']['verifikovano']==0){
          header('Location:verifikovano.php');
      }
    }

    $poruka = '';
    if(isset($_POST["unesi"])){

        include("mecClass.php");
        $mec = new Mec($db);

        if($mec->unesiMec()){
          $poruka = 'Uspesno sacuvan mec';
        }else{
          $poruka = 'Greska pri cuvanju';
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
					<h2 class="h-bold">Unos novog meca</h2>
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
                                <label for="domacin" class="cols-sm-2 control-label">Domacin</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select id="domacin" class="form-control" name="domacin" >
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
                                <label for="gost" class="cols-sm-2 control-label">Gost</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select id="gost" class="form-control" name="gost" >
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
                                <label for="golDom" class="cols-sm-2 control-label">Golova domacin</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="golDom" id="golDom"  placeholder="Golova domacin"/>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="golGost" class="cols-sm-2 control-label">Golova gost</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="golGost" id="golGost"  placeholder="Golova gost"/>
                                  </div>
                                </div>
                              </div>



                              <div class="form-group ">
                                <button type="submit" name="unesi" id="button" class="btn btn-primary btn-lg btn-block login-button">Unesi mec</button>
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
