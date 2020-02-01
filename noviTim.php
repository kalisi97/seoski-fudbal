<?php
    include("init.php");

    if(empty($_SESSION['user'])){
      header('Location:index.php');
    }else{
      if($_SESSION['user']['admin']==0){
          header('Location:index.php');
      }
    }

    $poruka = '';
    if(isset($_POST["unesiTim"])){

            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                        $valid = false;
                        $poruka = 'Losa ekstenzija';
                    }
                    if ( $size/1024/1024 > 2 ) {
                        $valid = false;
                        $poruka = 'Preveliki fajl.';
                    }
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'grbovi' . DIRECTORY_SEPARATOR. $name;
                        move_uploaded_file($tmpName,$targetPath);
						$data = Array (
							"nazivTima" => trim($_POST['naziv']),
							"brojIgraca" => trim($_POST['brojIgraca']),
							"gradID" => trim($_POST['grad']),
							"grb" => $name
							);
							$id = $db->insert('tim', $data);
              $podaci = Array (
  							"timID" => $id,
  							"ukupnoUtakmica" => 0,
                "pobeda" => 0,
                "poraza" => 0,
                "nereseno" => 0,
                "golovaDatih" => 0,
                "golovaPrimljenih" => 0,
                "brojPoena" => 0

  							);
              $db->insert('tabela',$podaci);
              $poruka = 'Uspesno unet tim';

            }
                    break;

                default:
                    $poruka = 'Unknown error';
                break;
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
					<h2 class="h-bold">Unos novog tima</h2>
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
                          <form class="" method="post" action="" enctype="multipart/form-data">

                              <div class="form-group">
                                <label for="grad" class="cols-sm-2 control-label">Grad</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select id="grad" class="form-control" name="grad" >
                                      <?php
                                            $grad = $db->get('grad');
                                            foreach ($grad as $g ) {
                                              ?>
                                                <option value="<?php echo ($g['id']); ?>"><?php echo ($g['naziv']); ?></option>
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
                                    <input type="text" class="form-control" name="naziv" id="naziv"  placeholder="Naziv tima"/>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="brojIgraca" class="cols-sm-2 control-label">Broj igraca</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="brojIgraca" id="brojIgraca"  placeholder="Broj Igraca"/>
                                  </div>
                                </div>
                              </div>


                              <div class="form-group">
                                <label for="file" class="cols-sm-2 control-label">Naziv</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                    <input type="file" name="file" placeholder="Ubacite grb">
										                <p class="help-block">Samo jpg,jpeg,png and gif slike su dozvoljene</p>
                                  </div>
                                </div>
                              </div>


                              <div class="form-group ">
                                <button type="submit" name="unesiTim" id="button" class="btn btn-primary btn-lg btn-block login-button">Unesi tim</button>
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
