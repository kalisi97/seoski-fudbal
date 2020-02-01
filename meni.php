<div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
                          <div class="container">
                                <div class="row">
                                      <div class="col-md-2 mob-logo">
                                            <div class="row">
                                                  <div class="site-logo">
                                                        <a href="index.php"><img src="img/logo-dark.png" alt="" /></a>
                                                  </div>
                                            </div>
                                      </div>


                                      <div class="col-md-10 mob-menu">
                                            <div class="row">
                                      <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                            <i class="fa fa-bars"></i>
                                            </button>
                                      </div>
                                                  <div class="collapse navbar-collapse" id="menu">
                                                        <ul class="nav navbar-nav navbar-right">
                                                              <li class="active"><a href="index.php">Pocetna</a></li>
                                                              <li><a href="onama.php">O ligi</a></li>
                                                              <li><a href="tabelaTimovi.php">Tabela</a></li>
                                                              <li><a href="lige.php">Lista liga</a></li>
                                                              <li><a href="premijer.php">Lista timova PL</a></li>
                                                              <?php
                                                                  if(empty($_SESSION['user'])){
                                                                    ?>
                                                                    <li><a href="registracija.php">Registracija</a></li>
                                                                    <li><a href="login.php">Login</a></li>
                                                                    <?php
                                                                  }else{
                                                                    if($_SESSION['user']['admin']){
                                                                      ?>
                                                                        <li><a href="admin.php">Admin</a></li>
                                                                      <?php
                                                                    }
                                                                    ?>
                                                                      <li><a href="noviMec.php">Unesi novi mec</a></li>
                                                                      <li><a href="logout.php">Logout</a></li>
                                                                    <?php
                                                                  }
                                                               ?>

                                                        </ul>
                                                  </div>
                                            </div>
                                      </div>
                                </div>
                          </div>
                    </nav>
</div>
