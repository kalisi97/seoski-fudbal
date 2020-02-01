<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

    include("init.php");
    $poruka = '';
    if(isset($_POST["registracija"])){

        include("korisnikKlasa.php");
        $user = new Korisnik($db);

        if($user->registrujKorisnika()){
          $poruka = 'Uspesno registrovan korisnik';
        }else{
          $poruka = 'Neuspesna registracija';
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

    <section id="about" class="home-section color-dark bg-white">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Forma za registraciju</h2>
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
                              <label for="ime" class="cols-sm-2 control-label">Ime</label>
                              <div class="cols-sm-10">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="ime" id="ime"  placeholder="Ime"/>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="prezime" class="cols-sm-2 control-label">Prezime</label>
                              <div class="cols-sm-10">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="prezime" id="prezime"  placeholder="Prezime"/>
                                </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Username</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                                  </div>
                                </div>
                              </div>



                              <div class="form-group ">
                                <button type="submit" name="registracija" id="button" class="btn btn-primary btn-lg btn-block login-button">Registracija</button>
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
