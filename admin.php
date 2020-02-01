<?php
    include("init.php");

    if(empty($_SESSION['user'])){
      header('Location:index.php');
    }else{
      if($_SESSION['user']['admin']==0){
          header('Location:index.php');
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
					<h2 class="h-bold">Admin panel</h2>
					<div class="divider-header"></div>
					<p>menjaj pazljivo</p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		        <div class="container">


                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                          <a href="noviTim.php" class="btn btn-info btn-lg">Novi tim <i class="fa fa-plus"></i></a>
                          <a href="izmenaNaziva.php" class="btn btn-info btn-lg">Izmena naziva <i class="fa fa-refresh"></i></a>
                        </div>
                        <br><br><br>
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                          <select id="gradovi" class="form-control" onchange="popuniTabelu()">
                            <?php
                                  $gradovi = $db->get('grad');
                                  foreach ($gradovi as $g ) {
                                    ?>
                                      <option value="<?php echo ($g['id']); ?>"><?php echo ($g['naziv']); ?></option>
                                    <?php
                                  }
                              ?>
                          </select>
                          <div id="tabela"></div>
                        </div>

                        <br><br><br>
                        <div class="col-xs-12 col-sm-12 col-md-12 wow bounceInUp text-left">
                          <ul class="list-group">
                          <?php
                            $curl_zahtev = curl_init("http://localhost/betonliga/projekat/flightApi/timoviPoGradovima.json");
                            curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
                            $curl_odgovor = curl_exec($curl_zahtev);
                            $json_objekat=json_decode($curl_odgovor, true);
                            curl_close($curl_zahtev);
                              foreach($json_objekat as $t):
                    ?>
                    <li class="list-group-item"><?php echo ($t["naziv"]." - broj timova: ".$t["brojTimova"]); ?></li>
                  <?php endforeach; ?>
                </ul>
                <h1> Neverifikovani korisnici </h1>
                <ul class="list-group">
                <?php
                  $curl_zahtev = curl_init("http://localhost/betonliga/projekat/flightApi/verifikovaniKorisnici.json");
                  curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
                  $curl_odgovor = curl_exec($curl_zahtev);
                  $json_objekat=json_decode($curl_odgovor, true);
                  curl_close($curl_zahtev);
                    foreach($json_objekat as $t):
          ?>
          <li class="list-group-item"><?php echo ($t["ime"]." ".$t["prezime"]); ?> <button class="btn btn-lg btn-primary" onclick="verifikuj(<?php echo($t['id'])?>)" >Verifikuj</button></li>
        <?php endforeach; ?>
        <div id="verOdgovor"></div>
      </ul>
                        </div>

                        <div class="col-md-12 text-center">
                            <h1> Vizuelizacija </h1>
                            <div id="chart-div">
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
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script>

    		function popuniTabelu(){

    			var gradID = $("#gradovi").val();
    			$.ajax({
    				url: "tabela.php",
    				data: "id="+gradID,
    				success: function(result){
    				var text = '<table class="table table-hover"><thead><tr><th>Mec</th><th>Rezultat</th><th>Grad</th><th>Brisanje</th></tr></thead><tbody>';
    				$.each($.parseJSON(result), function(i, val) {
    					text += '<tr>';
    					text += '<td>'+val.domacin + ' - '+val.gost +'</td>';
    					text += '<td>'+val.golovaDomacin + ':'+val.golovaGost+'</td>';
    					text += '<td>'+val.grad+'</td>';
    					text += '<td><a href="obrisi.php?id='+val.mecID+'">Obrisi</a></td>';
    					text += '</tr>';

    					});

    					text+='</tbody></table>';
    					$('#tabela').html(text);
    			}});
    		}

    </script>
    <script>
    		$( document ).ready(function() {
    			popuniTabelu();
    		});
    </script>
    <script>
    function verifikuj(id){


      $.ajax({
        url: "verifikacija.php",
        data: "id="+id,
        success: function(result){
          $('#verOdgovor').html("<div class='alert alert-info'>Korisnik je verifikovan. Molimo vas da osvezite stranicu ako zelite da vidite osvezen spisak neverifikovanih korisnika.</div> ");
      }});
    }
    </script>

    <script type="text/javascript">
        google.load('visualization', '1', {'packages':['corechart']});
        google.setOnLoadCallback(chart);
        function chart() {
          var jsonData = $.ajax({
          url: "vizuelizacija.php",
          dataType:"json",
          async: false
        }).responseText;
        var data = new google.visualization.DataTable(jsonData);
        var options = {'title':'Broj pobeda po timovima',
         backgroundColor: { fill:'white' },
    	    titleTextStyle: {
    		textAlign: 'center',
            color: 'black',
    	fontSize: 40},
    	  'width':600,
          'height':400,
    	  legend: {
            textStyle: {
    			color: 'black'
            }
        },
    	  };
     var chart = new google.visualization.PieChart(document.getElementById('chart-div'));
        chart.draw(data,  options);

      }

    </script>

</body>

</html>
