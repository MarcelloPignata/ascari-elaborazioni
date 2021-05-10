<?php
    session_start();
    $_SESSION["page"] = "prenota";

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

    $sql = "SELECT * FROM parti";
    $result = $conn->query($sql);
    $parti = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($parti,$row);
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
      
    <link rel="icon" type="image/png" href="images/logo.png">
      
    <script>
        
        // array contenenti i dati del database
        var automobili;
        var kit;
        var parti;
        
        var prezzo;
        var categorie_disponibili = [];
        
        // funzione eseguita all'avvio della pagina
        function avvio()
        {
            // imposto data minima selezionabile
            var tomorrow = new Date();
            tomorrow.setDate(new Date().getDate()+1);
            var dd = tomorrow.getDate();
            var mm = tomorrow.getMonth()+1;
            var yyyy = tomorrow.getFullYear();
            if(dd<10){dd='0'+dd;} 
            if(mm<10){mm='0'+mm;} 
            var date = yyyy+'-'+mm+'-'+dd;
            document.getElementById("data").setAttribute("min", date); 
            
            // converto gli array dei database di PHP in javascript
            automobili = <?php echo json_encode($automobili); ?>;
            kit = <?php echo json_encode($kit); ?>;
            parti = <?php echo json_encode($parti); ?>;
            
            // carico tutte le auto disponibili nel corrispondente menù a tendina
            var i, select_auto = document.getElementById("select_auto");
            for (i = 0; i < automobili.length; i++)
            {
                var option = document.createElement('option');

                option.text = automobili[i]["marca"] + " " + automobili[i]["modello"] + " " + automobili[i]["serie"];
                option.value = automobili[i]["id"]; 

                select_auto.appendChild(option); 
            }
        }
        
        // funzione eseguita ogni volta che viene selezionata un'auto
        function change_selected_auto()
        {
            var id_auto = document.getElementById("select_auto").value;
            
            // KIT
            
                var select_kit = document.getElementById("select_kit");

                // svuoto il menù a tendina della selezione kit
                var i, L = select_kit.options.length - 1;
                for(i = L; i > 0; i--)
                {select_kit.remove(i);}

                // aggiungo al menù a tendina tutti i kit disponibili per la macchina selezionata
                for (i = 0; i < kit.length; i++)
                {
                    if(kit[i]["id_automobile"] == id_auto)
                    {
                        var option = document.createElement('option');
                        option.text = kit[i]["nome"];
                        option.value = kit[i]["id"]; 
                        select_kit.appendChild(option); 
                    }
                }

                // svuoto le informazioni sul kit, essendo esso non più selezionato
                document.getElementById("descrizione_kit").innerHTML = "";
            
            
            
            // PERS
            
                var pers_col = document.getElementById("pers_col");
                categorie_disponibili = [];
            
                pers_col.innerHTML = "";
                document.getElementById("prenota_pers").style.display = "none";
            
                // ottengo tutte le categorie di parti disponibili per l'auto selezionata
                for (i = 0; i < parti.length; i++)
                {
                    if (parti[i]["id_automobile"] == id_auto)
                    {
                        if(!categorie_disponibili.includes(parti[i]["categoria"]))
                        {
                            categorie_disponibili.push(parti[i]["categoria"]);
                        }
                    }
                }
                
                // creo un menù a tendina per ogni categoria disponibile
                for (i = 0; i < categorie_disponibili.length; i++)
                {
                    pers_col.innerHTML += '<label>' + categorie_disponibili[i] + '</label><select class="form-control" id="' + categorie_disponibili[i] + '" onchange="aggiorna_informazioni();"> <option></option> </select>';
                }
            
                // aggiungo ad ogni menù a tendina le rispettive opzioni
                for (i = 0; i < parti.length; i++)
                {
                    if (parti[i]["id_automobile"] == id_auto)
                    {
                        var option = document.createElement('option');
                        option.text = parti[i]["nome"];
                        option.value = parti[i]["id"]; 
                        document.getElementById(parti[i]["categoria"]).appendChild(option);
                    }
                }
            
                // se è selezionata un'auto visualizzo il pulsante di submit
                if (categorie_disponibili.length > 0)
                {
                    document.getElementById("prenota_pers").style.display = "block"; 
                }
            
            
            aggiorna_informazioni();
        }
        
        // aggiorno prezzo e descrizioni in base a cosa viene selezionato
        function aggiorna_informazioni()
        {
            prezzo = 0;
            
            // aggiungo il prezzo del bancaggio, se selezionato
            if(document.getElementById("bancaggio").checked)
            { prezzo += 50;}
            
            // trovo il kit selezionato nel database e aggiungo il suo prezzo
            var i;
            for (i = 0; i < kit.length; i++)
            {
                if(kit[i]["id"] == document.getElementById("select_kit").value)
                {
                    prezzo += parseFloat(kit[i]["prezzo"]);
                    
                    document.getElementById("descrizione_kit").innerHTML = kit[i]["descrizione"];

                    break;
                }
            }
            
            // visualizzo il prezzo a schermo solo se esso è maggiore di zero
            if(prezzo == 0)
            {
                document.getElementById("descrizione_kit").innerHTML = "";
                document.getElementById("prezzo_kit").innerHTML = "";
            }
            else
            {
                document.getElementById("prezzo_kit").innerHTML = prezzo + '€';
            }
            
            
            // per ogni menù a tendina delle categorie trovo il prezzo del valore selezionato e lo aggiungo
            for (i = 0; i < categorie_disponibili.length; i++)
            {
                if(document.getElementById(categorie_disponibili[i]).value != "")
                {
                    var j;
                    for (j = 0; j < parti.length; j++)
                    {
                        if(parti[j]["id"] == document.getElementById(categorie_disponibili[i]).value)
                        {
                            prezzo += parseFloat(parti[j]["prezzo"]);
                            break;
                        }
                    }
                }
            }
            
            // visualizzo il prezzo a schermo solo se esso è maggiore di zero
            if(prezzo == 0)
            {
                document.getElementById("prezzo_pers").innerHTML = "";
            }
            else
            {
                document.getElementById("prezzo_pers").innerHTML = prezzo + '€';
            }
        }
        
        function show_pers()
        {
            // visualizzo sezione elaborazione personalizzata
            document.getElementById("pers").style.display = "block";
            
            // nascondo sezione kit
            document.getElementById("kit").style.display = "none";
            
            // cambio colore ai due pulsanti
            document.getElementById("pers_btn").classList.remove("btn-light");
            document.getElementById("pers_btn").classList.add("btn-dark");
            document.getElementById("kit_btn").classList.remove("btn-dark");
            document.getElementById("kit_btn").classList.add("btn-light");
            
            // svuoto la sezione kit
            document.getElementById("select_kit").value = "";
            document.getElementById("prezzo_kit").innerHTML = "";
            document.getElementById("descrizione_kit").innerHTML = "";
            
            // aggiorno il prezzo
            prezzo = 0;
            if(document.getElementById("bancaggio").checked)
            {
                prezzo += 50;
                document.getElementById("prezzo_pers").innerHTML = prezzo + '€';
            }
        }

        function show_kit()
        {
            // nascondo sezione elaborazione personalizzata
            document.getElementById("pers").style.display = "none";
            
            // visualizzo sezione kit
            document.getElementById("kit").style.display = "block";
            
            // cambio colore ai due pulsanti
            document.getElementById("kit_btn").classList.remove("btn-light");
            document.getElementById("kit_btn").classList.add("btn-dark");
            document.getElementById("pers_btn").classList.remove("btn-dark");
            document.getElementById("pers_btn").classList.add("btn-light");
            
            // svuoto la sezione kit
            document.getElementById("prezzo_pers").innerHTML = "";
            var i;
            for (i = 0; i < categorie_disponibili.length; i++)
            {
                document.getElementById(categorie_disponibili[i]).value = "";
            }
            
            // aggiorno il prezzo
            prezzo = 0;
            if(document.getElementById("bancaggio").checked)
            {
                prezzo += 50;
                document.getElementById("prezzo_kit").innerHTML = prezzo + '€';
            }
        }
        
    </script>
  </head>
  <body onload="avvio();">
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Ascari<span>Elaborazioni</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="prenota.php" class="nav-link">Prenota elaborazione</a></li>
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
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
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
                                <select class="form-control" id="select_auto" onchange="change_selected_auto();" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" id="data" required>
                            </div>
                        </div>
                    </div>
                    


                    <div class="row">
                        <div class="col">
                            <input type="button" class="btn btn-light" onclick="show_pers()" id="pers_btn" value="Elaborazione personalizzata">
                            <input type="button" class="btn btn-light" onclick="show_kit()" id="kit_btn" value="Selezione kit">
                        </div>
                        <div class="col">
                                <input class="form-check-input" type="checkbox" id="bancaggio" onclick="aggiorna_informazioni();">
                                <label class="form-check-label" for="bancaggio" style="color:black;" >
                                    Bancaggio post-elaborazione
                                </label>
                        </div>
                    </div>

                            <!--PERSONALIZZA ELABORAZIONE-->
                            <div id="pers" style="display: none;">


                                <div class="row">
                                
                                    <div class="col" id="pers_col">
                                    
                                        <br>

                                    </div>
                                    
                                </div>


                                <div class="row">

                                    <div class="col">
                                        <br>
                                        <p id="prezzo_pers" style="color:black;"></p>
                                        <button type="submit" class="btn btn-primary" name="submit" value="kit" id="prenota_pers">Prenota</button>
                                    </div>

                                </div>
                            </div>

                            <!--SELEZIONA KIT-->
                            <div id="kit" style="display: none;">

                                <div class="row">
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label></label>
                                            <select class="form-control" id="select_kit" onchange="aggiorna_informazioni();" required>
                                                <option value="">Seleziona kit...</option>
                                            </select>
                                        </div>
                                    </div>
                                        
                                        <div class="col">
                                            <br>
                                            <p id="descrizione_kit" style="color:black;"></p>
                                        </div>

                                </div>

                                <div class="row">

                                    <div class="col">
                                        <p id="prezzo_kit" style="color:black;"></p>
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