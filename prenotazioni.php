<?php
    session_start();
    $_SESSION["page"] = "prenotazioni";


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ascari-elaborazioni";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ascari Elaborazioni - Visualizza prenotazioni</title>
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
        
        function show(on)
        {
            var off1, off2;
            switch(on)
            {
                case 1:
                    on = "elaborazioni";
                    off1 = "banco";
                    off2 = "eventi"
                    break;
                    
                case 2:
                    on = "banco";
                    off1 = "elaborazioni";
                    off2 = "eventi"
                    break;
                    
                case 3:
                    on = "eventi";
                    off1 = "elaborazioni";
                    off2 = "banco"
                    break;
            }
            
            // nascondo le altre sezioni
            document.getElementById(off1).style.display = "none";
            document.getElementById(off2).style.display = "none";
            
            // visualizzo l'elaborazione
            document.getElementById(on).style.display = "block";
            
            // cambio colore ai pulsanti
            document.getElementById(on+"_btn").classList.remove("btn-light");
            document.getElementById(on+"_btn").classList.add("btn-dark");
            document.getElementById(off1+"_btn").classList.remove("btn-dark");
            document.getElementById(off1+"_btn").classList.add("btn-light");
            document.getElementById(off2+"_btn").classList.remove("btn-dark");
            document.getElementById(off2+"_btn").classList.add("btn-light");
        }
        
        
        
        function disiscrivi_evento(id_evento)
        {
            document.getElementById("id_evento").value = id_evento;
            document.getElementById("submit_disiscrizione").click();
        }
        
        function elimina_elaborazione (id_elaborazione)
        {
            document.getElementById("id_elaborazione").value = id_elaborazione;
            document.getElementById("submit_elimina_elaborazione").click();
        }
        
        function elimina_banco (id_banco)
        {
            document.getElementById("id_banco").value = id_banco;
            document.getElementById("submit_elimina_banco").click();
        }
        
    </script>
  </head>
  <body style = "padding-right: 0 !important;" <?php if(isset($_GET["show"])){echo "onload='show(".$_GET["show"].")'";}?> >
    
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
                                <a href="prenotazioni.php" style="background-color:black; color: white;">Prenotazioni</a>
                                <a href="dati.php">Modifica dati</a>
                                <a href="password.php">Modifica password</a>
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
                ?>
                <form action="query.php" method="post" <?php if(!isset($_SESSION["id_utente"])){echo 'style="display:none;"';}?>>
                    
                        <div class='row'><h4>&nbsp;</h4></div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="button" class="btn btn-light" onclick="show(1)" id="elaborazioni_btn" value="Prenotazioni elaborazioni">
                                <input type="button" class="btn btn-light" onclick="show(2)" id="banco_btn" value="Prenotazioni banco">
                                <input type="button" class="btn btn-light" onclick="show(3)" id="eventi_btn" value="Iscrizioni eventi">
                            </div>
                        </div>
                        </div>
                        <div class='row'><h4>&nbsp;</h4></div>
                    
                        <div class="row">
                            <div class="col">
                                
                                <div id="elaborazioni" style="display:none;">
                                    
                                    <?php

                                        $sql = "SELECT pre.id, aut.marca, aut.modello, aut.serie, pre.targa, pre.data, pre.bancaggio, pre.preventivo FROM prenotazioni_elaborazioni pre INNER JOIN automobili aut ON pre.id_automobile = aut.id WHERE id_utente = ".$_SESSION["id_utente"]." AND pre.stato = 'da ricevere'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            
                                            echo '<div class="list-group">';
                                            while($row = $result->fetch_assoc())
                                            {
                                              if ($row["bancaggio"])
                                              {
                                                  $bancaggio = "Sì";
                                              }
                                              else
                                              {
                                                  $bancaggio = "No";
                                              }
                                              
                                            echo '<div class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">Prenotazione #'.$row["id"].'</h5>
                                                        <button type="button" class="btn btn-danger" onclick="elimina_elaborazione('.$row["id"].')">Elimina</button></div>
                                                        <p class="mb-1">'.$row["marca"].' '.$row["modello"].' '.$row["serie"].' ('.$row["targa"].')</p>
                                                        <p class="mb-1">Da consegnare il '.$row["data"].'</p>
                                                        <p class="mb-1">Bancaggio: '.$bancaggio.'</p>
                                                        <p class="mb-1">Preventivo: '.$row["preventivo"].'€</p>
                                                        <p class="mb-1">Parti richieste: ';
                                                
                                                $sql = "SELECT par.nome FROM parti_prenotazioni par_pre INNER JOIN parti par on par_pre.id_parte = par.id WHERE par_pre.id_prenotazione =".$row["id"];
                                                $result2 = $conn->query($sql);
                                                if ($result2->num_rows > 0)
                                                {   
                                                    echo $result2->fetch_assoc()["nome"];
                                                    while($row2 = $result2->fetch_assoc())
                                                    {
                                                        echo ", ".$row2["nome"];
                                                    }
                                                    
                                                }
                                                echo '</p>
                                                </div>';
                                            }

                                            echo '</div>';
                                        
                                            echo '<input type="number" name="id_elaborazione" id="id_elaborazione" readonly hidden>';
                                            echo '<button type="submit" name="eliminazione_elaborazione" id="submit_elimina_elaborazione" hidden>';
                                        }
                                        else
                                        {
                                            echo "<p>Non hai nessuna prenotazione, <a href='prenota.php'>registrane una!</a></p>";
                                        }
                                    
                                    ?>
                                    
                                </div>
                                
                                <div id="banco" style="display:none;">
                                    
                                    <?php

                                        $sql = "SELECT * FROM prenotazioni_banco WHERE id_utente = ".$_SESSION["id_utente"];
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            
                                            echo '<div class="list-group">';
                                            while($row = $result->fetch_assoc())
                                            { 
                                                echo '<div class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">Prenotazione #'.$row["id"].'</h5>
                                                            <button type="button" class="btn btn-danger" onclick="elimina_banco('.$row["id"].')">Elimina</button></div>
                                                            <p class="mb-1">'.$row["data"].' '.$row["ora"].'</p>
                                                        </div>';
                                            }
                                            echo '</div><input type="number" name="id_banco" id="id_banco" readonly hidden>';
                                            echo '<button type="submit" name="eliminazione_banco" id="submit_elimina_banco" hidden>';
                                        }
                                        else
                                        {
                                            echo "<p>Non hai nessuna prenotazione, <a href='banco.php'>registrane una!</a></p>";
                                        }
                                
                                        ?>
                                </div>
                                
                                <div id="eventi" style="display:none;">
                                    
                                    
                                    <?php

                                        $sql = "SELECT eve.id, eve.nome, eve.luogo, eve.data, eve.ora, eve.descrizione, eve.contatti FROM iscrizioni_eventi isc INNER JOIN eventi eve on isc.id_evento = eve.id WHERE isc.id_utente = ".$_SESSION["id_utente"];
                                        $result = $conn->query($sql);
                                        $iscrizioni = array();
                                        if ($result->num_rows > 0)
                                        {
                                            echo '<div class="list-group">';
                                            
                                            while($row = $result->fetch_assoc())
                                            {
                                               echo   '<div class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">'.$row["nome"].'</h5>
                                                            <button type="button" class="btn btn-danger" onclick="disiscrivi_evento('.$row["id"].')">Disiscriviti</button></div>
                                                            <p class="mb-1">'.$row["descrizione"].'</p>
                                                            <p class="mb-1">'.$row["data"].', '.$row["ora"].'</p>
                                                            <p class="mb-1">Contatti: '.$row["contatti"].'</p>
                                                        </div>';
                                            }
                                        
                                            echo '</div><input type="number" name="id_evento" id="id_evento" readonly hidden>';
                                            echo '<button type="submit" name="disiscrizione_evento" id="submit_disiscrizione" hidden>';
                                        }
                                        else
                                        {
                                            echo "<p>Non sei iscritto a nessun evento, <a href='eventi.php'>trovane uno!</a></p>";
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                            
                        <div class='row'>
                            <div class='col'>
                                <?php
                                    if(isset($_GET["error"]))   
                                    {
                                        echo '<br><p style="color: #d90000;" id="phptext">Errore PHP</p>';
                                    }
                                ?>
                        </div>
                        </div>
                        </form>
                        <br><p style="color: #d90000;" id="errore"></p>
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