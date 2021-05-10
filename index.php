<?php
    session_start();
    $_SESSION["page"] = "index";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ascari Elaborazioni</title>
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
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Ascari<span>Elaborazioni</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="prenota.php" class="nav-link">Prenota elaborazione</a></li>
	          <li class="nav-item"><a href="banco.php" class="nav-link">Prove su banco</a></li>
	          <li class="nav-item"><a href="eventi.php" class="nav-link">Eventi</a></li>
                
                <?php
                    if(isset($_SESSION["nome"]))
                    {
	                    echo '<li class="nav-item"><a href="logout.php" class="nav-link"><img src="images/account.png" width="25px">&nbsp;'.$_SESSION["nome"].' '.$_SESSION["cognome"].'</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a href="login.php" class="btn btn-info nav-link">Accedi</a></li>';
                    }
                ?>
                
	        </ul>
	      </div>
	    </div>
	  </nav>
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Dietro ogni grande pilota c'è sempre una grande officina</h1>
	            <p style="font-size: 18px;">Passione e tecnica dal 1992</p>
            </div>
          </div>
        </div>
      </div>
    </div>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Servizi</span>
            <h2 class="mb-3">La nostra offerta</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Elaborazioni personalizzate</h3>
                <p>Seleziona le componenti che vorresti vedere sulla tua auto e al resto ci pensiamo noi!</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Stage tuning</h3>
                <p>Affidati ad uno dei nostri kit specifici per la tua auto, al migliore dei prezzi!</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-suv"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Prove su banco</h3>
                <p>Qualsiasi sia la potenza e la coppia, vieni a scoprirlo sul nostro banco di prova!</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Eventi</h3>
                <p>Consulta il nostro calendario di selezione di eventi tuning e automotivi!</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="29">0</strong>
                <span>Anni di <br>esperienza</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Elaborazioni <br>effettuate</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1347">0</strong>
                <span>Clienti <br>soddisfatti</span>
              </div>
            </div>
          </div>
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