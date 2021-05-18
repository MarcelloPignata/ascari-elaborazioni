<?php
    session_start();
    $_SESSION["page"] = "index";
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Ascari Elaborazioni - Modifica password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
      
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="css/user-dropdown.css">
    
    <script>
        function enablePassword2()
            {
                if(document.getElementById("password1").value != "")
                {
                    document.getElementById("password2").disabled = false;
                }
                else
                {
                    document.getElementById("password2").disabled = true;
                }
            }
        
        function controlli()
        {
            var p = document.getElementById("errore");
            var vecchiapassword = document.getElementById("vecchiapassword").value;
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
                
                if(password1 == "" || vecchiapassword == "")
                {
                    p.innerHTML = "Inserisci una password";
                }
                else if (password1 != password2)
                {
                    p.innerHTML = "Le password non coincidono";
                }
                else if(password1.length > 20)
                {
                    p.innerHTML = "Inserisci una password più corta";
                }
                else
                {
                    document.getElementById("submit").click();
                }
            
                try
                {
                    document.getElementById("phptext").innerHTML = "";
                }catch(error){}
        }
    </script>
  </head>
  <body style = "padding-right: 0 !important;">
    
	  <nav class="navbar navbar-expand-lg navbar-dark  bg-dark ftco-navbar-light scrolled awake" id="ftco-navbar"  style = "padding-right: 0 !important;">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Ascari<span>Elaborazioni</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="prenota.php" class="nav-link">Prenota elaborazione</a></li>
	          <li class="nav-item"><a href="banco.php" class="nav-link">Prove su banco</a></li>
	          <li class="nav-item"><a href="eventi.php" class="nav-link">Eventi</a></li>
	          <?php
                    if(isset($_SESSION["id_utente"]))
                    {
	                    echo '<li class="nav-item dropdown"><button class="nav-link dropbtn" id="username"><img src="images/account.png" width="25px">&nbsp;'.$_SESSION["nome"].' '.$_SESSION["cognome"].'</button>';
                        
                        echo '<div class="dropdown-content">
                                <a href="prenotazioni.php">Prenotazioni</a>
                                <a href="dati.php">Modifica dati</a>
                                <a href="password.php" style="background-color:black; color: white;">Modifica password</a>
                                <a href="logout.php">Disconnettiti</a>
                              </div>';
                        
                        echo '</li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a href="login.php" class="btn btn-success nav-link" id="accedi">Accedi</a></li>';
                    }
               ?>
	        </ul>
	      </div>
	    </div>
	  </nav>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="col-md-12">
                
                <?php
                    if(!isset($_SESSION["id_utente"]))
                    {
                        echo "
                        <div class='row'><h4>&nbsp;</h4></div>
                        <div class='row'><h4>&nbsp;</h4></div>
                        <div class='row'><h4>&nbsp;</h4></div>
                        <div class='row'><h4>Devi aver effettuato l'accesso per accedere a questa sezione</h4></div>    
                        <div class='row'><h4>&nbsp;</h4></div>
                        <div class='row'><h4>&nbsp;</h4></div>";
                    }
                    else
                    {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "ascari-elaborazioni";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error){echo "<script>alert('errore php')</script>";}

                        $sql = "SELECT * FROM utenti WHERE id = ".$_SESSION["id_utente"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $utente = $result->fetch_assoc();
                          }else {
                          echo "<script>alert('errore php')</script>";
                        }
                    }
                ?>
                <form action="query.php" method="post" <?php if(!isset($_SESSION["id_utente"])){echo 'style="display:none;"';}?>>
                        <div class="row"><h4>&nbsp;</h4></div>
                        <div class="row"><h3>Modifica password</h3></div>
                        <div class="row"><h4>&nbsp;</h4></div>
                        
                        <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="select_auto">Vecchia password</label>
                                        <input type="password" name="vecchiapassword" id="vecchiapassword" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="select_auto">Nuova password</label>
                                        <input type="password" name="password1" id="password1" oninput="enablePassword2();" class="form-control" required>
                                    </div>
                                </div><div class="col">
                                    <div class="form-group">
                                        <label for="select_auto">Ripeti nuova password</label>
                                        <input type="password" name="password2" id="password2" class="form-control" required disabled>
                                    </div>
                                </div>
                            <div class="col"></div>
                        </div>
                        <div class="row"><h4>&nbsp;</h4></div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" onclick="controlli()">Modifica password</button>
                                <button type="submit" name="modificaPassword" id="submit" hidden></button>
                        </div>
                        </div>
                        </form>
                        <br><p style="color: #d90000;" id="errore"></p>
                    <?php
                        if(isset($_GET["success"]))
                        {
                            echo '<br><p style="color: green;" id="phptext">Password modificata con successo</p>';
                        }
                        else if(isset($_GET["wrongpassword"]))
                        {
                            echo '<br><p style="color: #d90000;" id="phptext">Vecchia password errata</p>';
                        }
                        else if(isset($_GET["error"]))
                        {
                            echo '<br><p style="color: #d90000;" id="phptext">Errore PHP</p>';
                        }
                    ?>
            </div>
        </div>
    </section>
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Ascari<span>Elaborazioni</span></a></h2>
              <p>Progetto di maturità di Marcello Pignata, 5°B Informatico, IIS Jean Monnet, Mariano Comense (CO)</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Link esterni</h2>
              <ul class="list-unstyled">
                <li><a href="amministrazione.php" class="py-2 d-block">Amministrazione</a></li>
                <li><a href="https://github.com/MarcelloPignata/ascari-elaborazioni" class="py-2 d-block">Github</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Servizi</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">Home</a></li>
                <li><a href="prenota.php" class="py-2 d-block">Prenota elaborazione</a></li>
                <li><a href="banco.php" class="py-2 d-block">Prove su banco</a></li>
                <li><a href="eventi.php" class="py-2 d-block">Eventi</a></li>
                <li><a href="login.php" class="py-2 d-block">Accedi</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contatti</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Monza(MB) 20900, via Rizzuto 23</span></li>
	                <li><span class="icon icon-phone"></span><span class="text">+39 123 456 7890</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">info@ascari-elaborazioni.it</span></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Pignata Marcello, tutti i diritti riservati
            </p>
              
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>