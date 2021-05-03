<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ascari-elaborazioni";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM automobili";
    $result = $conn->query($sql);
    $automobili = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($automobili,$row);
      }
    } else {
      echo "0 results";
    }

    $sql = "SELECT * FROM kit";
    $result = $conn->query($sql);
    $kit = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($kit,$row);
      }
    } else {
      echo "0 results";
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ascari Elaborazioni - Prenota elaborazione</title>
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
      
    <script>
        
        var automobili;
        var kit;
        
        function avvio()
        {
            var tomorrow = new Date();
            tomorrow.setDate(new Date().getDate()+1);
            var dd = tomorrow.getDate();
            var mm = tomorrow.getMonth()+1;
            var yyyy = tomorrow.getFullYear();
            if(dd<10)
            {
                dd='0'+dd;
            } 
            if(mm<10)
            {
                mm='0'+mm;
            } 

            var date = yyyy+'-'+mm+'-'+dd;
            document.getElementById("data").setAttribute("min", date); 
            
            automobili = <?php echo json_encode($automobili); ?>;
            kit = <?php echo json_encode($kit); ?>;
            
            /*
            var i;
            for (i = 0; i < automobili.length; i++)
            {
                console.log(automobili[i]["id"] + "  |  " + automobili[i]["marca"] + " " + automobili[i]["modello"] + " " + automobili[i]["serie"]);
                
            }
            
            var i;
            for (i = 0; i < kit.length; i++)
            {
                console.log(kit[i]["id"] + "  |  " + kit[i]["descrizione"]);
                
            }
            */
            
            var select_auto = document.getElementById("select_auto");
            
            var i;
            for (i = 0; i < automobili.length; i++)
            {
                var option = document.createElement('option');

                option.text = automobili[i]["marca"] + " " + automobili[i]["modello"] + " " + automobili[i]["serie"];
                option.value = automobili[i]["id"]; 

                select_auto.appendChild(option); 
            }
        }
        
        function change_selected_auto()
        {
            var id_auto = document.getElementById("select_auto").value;
            var select_kit = document.getElementById("select_kit");
            
            var i, L = select_kit.options.length - 1;
            
            for(i = L; i > 0; i--)
            {
                select_kit.remove(i);
            }
            
            var i;
            for (i = 0; i < kit.length; i++)
            {
                if(kit[i]["id_automobile"] == id_auto)
                {
                    var option = document.createElement('option');

                    option.text = kit[i]["descrizione"];
                    option.value = kit[i]["id"]; 

                    select_kit.appendChild(option); 
                }
            }
        }
        
        function show_pers()
        {
            document.getElementById("pers").style.display = "block";
            document.getElementById("kit").style.display = "none";
            document.getElementById("pers_btn").classList.remove("btn-light");
            document.getElementById("pers_btn").classList.add("btn-dark");
            document.getElementById("kit_btn").classList.remove("btn-dark");
            document.getElementById("kit_btn").classList.add("btn-light");
        }

        function show_kit()
        {
            try{
            document.getElementById("pers").style.display = "none";
            document.getElementById("kit").style.display = "block";
            document.getElementById("kit_btn").classList.remove("btn-light");
            document.getElementById("kit_btn").classList.add("btn-dark");
            document.getElementById("pers_btn").classList.remove("btn-dark");
            document.getElementById("pers_btn").classList.add("btn-light");
            }catch(error){console.log(error);}
        }
        
    </script>
  </head>
  <body onload="avvio();">
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Ascari<span>Elaborazioni</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="prenota.html" class="nav-link">Prenota elaborazione</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Prove su banco</a></li>
	          <li class="nav-item"><a href="car.html" class="nav-link">Eventi</a></li>
	          <li class="nav-item"><a href="contact.html" class="btn btn-info nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">Prenota elaborazione</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
                <div class="col-md-12">

                <form>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="select_auto">Automobile</label>
                                <select class="form-control" id="select_auto" onchange="change_selected_auto();">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" id="data">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                        <input type="button" class="btn btn-light" onclick="show_pers()" id="pers_btn" value="Elaborazione personalizzata">
                        <input type="button" class="btn btn-light" onclick="show_kit()" id="kit_btn" value="Selezione kit">
                        </div>
                    </div>

                            <!--PERSONALIZZA ELABORAZIONE-->
                            <div id="pers" style="display: none;">


                                <!--...-->

                                <button type="submit" class="btn btn-primary" name="submit" value="pers">Prenota</button>
                            </div>

                            <!--SELEZIONA KIT-->
                            <div id="kit" style="display: none;">

                                <div class="row">
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label></label>
                                            <select class="form-control" id="select_kit">
                                                <option>Seleziona kit...</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" name="submit" value="kit">Prenota</button>
                                    </div>

                                </div>
                            </div>
                </form>
            </div>
        </div>
    </section>
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Ascari<span>Elaborazioni</span></a></h2>
              <p>In memoria di Alberto Ascari (1918 - 1955)</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Informazioni</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Su di noi</a></li>
                <li><a href="#" class="py-2 d-block">Contatti</a></li>
                <li><a href="#" class="py-2 d-block">Github</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Link</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home</a></li>
                <li><a href="#" class="py-2 d-block">Prenota elaborazione</a></li>
                <li><a href="#" class="py-2 d-block">Prove su banco</a></li>
                <li><a href="#" class="py-2 d-block">Eventi</a></li>
                <li><a href="#" class="py-2 d-block">Login</a></li>
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