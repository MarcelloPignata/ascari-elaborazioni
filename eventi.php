<?php

    session_start();
    $_SESSION["page"] = "eventi";

?>

<!DOCTYPE html>

<html lang="it">
    
    <head>
        
        <title>Ascari Elaborazioni - Eventi</title>
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap">
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
        <link rel="stylesheet" href="css/user-dropdown.css">
        
        <link rel="icon" type="image/png" href="images/logo.png">
        
        <script>
            
            function iscrivi_evento(id_evento)
            {
                document.getElementById("id_evento").value = id_evento;
                document.getElementById("submit_iscrizione").click();
            }
            
            function disiscrivi_evento(id_evento)
            {
                document.getElementById("id_evento").value = id_evento;
                document.getElementById("submit_disiscrizione").click();
            }
            
        </script>
        
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
                        
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="prenota.php" class="nav-link">Prenota elaborazione</a></li>
                        <li class="nav-item"><a href="banco.php" class="nav-link">Prove su banco</a></li>
                        <li class="nav-item active"><a href="eventi.php" class="nav-link">Eventi</a></li>
                        
                        <?php
                        
                            if(isset($_SESSION["id_utente"]))
                            {
                                echo '
                                    <li class="nav-item dropdown">
                                        <button class="nav-link dropbtn" id="username">

                                            <img src="images/account.png" width="25px">&nbsp;
                                            '.$_SESSION["nome"].' '.$_SESSION["cognome"].'

                                        </button>
                                        
                                        <div class="dropdown-content">
                                        
                                            <a href="prenotazioni.php">Prenotazioni</a>
                                            <a href="dati.php">Modifica dati</a>
                                            <a href="password.php">Modifica password</a>
                                            <a href="logout.php">Disconnettiti</a>
                                        
                                        </div>
                                        
                                    </li>
                                    ';
                            }
                            else
                            {
                                echo '
                                    <li class="nav-item">
                                    
                                        <a href="login.php" class="btn btn-success nav-link" id="accedi">Accedi</a>
                                        
                                    </li>
                                    ';
                            }
                        
                        ?>
                        
                    </ul>
                    
                </div>
                
            </div>
            
        </nav>
        
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
            
            <div class="overlay"></div>
            <div class="container">
                
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                    
                    <div class="col-md-9 ftco-animate pb-5">
                        
                        <h1 class="mb-3 bread">Eventi</h1>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </section>
        
        <section class="ftco-section contact-section">
            
            <div class="container">
                
                <div class="col-md-12">
                    
                    <?php
                    
                        // visualizzo la pagina solo se l'utente è loggato
                        if(!isset($_SESSION["id_utente"]))
                        {
                            echo "<h4>Devi aver effettuato l'accesso per accedere a questa sezione</h4>";
                        }
                        else
                        {
                            // stampo messaggi derivati dalla query php
                            if(isset($_GET["successinsert"]))
                            {
                                echo '<br><p style="color: green;" id="phptext">Iscrizione inserita con successo</p>';
                            }
                            else if(isset($_GET["successdelete"]))
                            {
                                echo '<br><p style="color: green;" id="phptext">Iscrizione rimossa con successo</p>';
                            }
                            else if(isset($_GET["error"]))
                            {
                                echo '<br><p style="color: #d90000;" id="phptext">Errore PHP</p>';
                            }
                            
                            // mi connetto al database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "ascari-elaborazioni";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {echo "<script>alert('errore php [connessione]')</script>";}
                            
                            // ottengo tutti gli eventi a cui l'utente è iscritto
                            $sql = "SELECT * FROM iscrizioni_eventi WHERE id_utente = ".$_SESSION["id_utente"];
                            $result = $conn->query($sql);
                            $iscrizioni = array();
                            if ($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    array_push($iscrizioni,$row["id_evento"]);
                                }
                            }
                            
                            // stampo i dati di tutti gli eventi
                            $sql = "SELECT * FROM eventi";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0)
                            {
                                echo '
                                    <form action="query.php" method="post">
                                        <div class="list-group"'.'<?php if(!isset($_SESSION["id_utente"])){echo '."'".'style="display:none;"'."'".';}?>';
                                while($row = $result->fetch_assoc())
                                {
                                    echo '
                                            <div class="list-group-item list-group-item-action flex-column align-items-start">

                                                <div class="d-flex w-100 justify-content-between">

                                                    <h5 class="mb-1">'.$row["nome"].'</h5>';
                                    
                                    // stampo il bottone corretto in base all'iscrizione o meno dell'utente
                                    if(!in_array($row["id"],$iscrizioni))
                                    {
                                        echo '      <button type="button" class="btn btn-info" onclick="iscrivi_evento('.$row["id"].')">Iscriviti</button>';
                                    }
                                    else
                                    {
                                        echo '      <button type="button" class="btn btn-success" onclick="disiscrivi_evento('.$row["id"].')">Disiscriviti</button>';
                                    }
                                    
                                    echo '
                                                </div>

                                                <p class="mb-1">'.$row["descrizione"].'</p>
                                                <p class="mb-1">'.$row["data"].', '.$row["ora"].'</p>
                                                <p class="mb-1">Contatti: '.$row["contatti"].'</p>

                                            </div>';
                                }
                                
                                echo '
                                            <input type="number" name="id_evento" id="id_evento" readonly hidden>
                                            <button type="submit" name="iscrizione_evento" id="submit_iscrizione" hidden>
                                            <button type="submit" name="disiscrizione_evento" id="submit_disiscrizione" hidden>
                                            
                                        </div>
                                        
                                    </form>';
                            }
                            else
                            {
                                echo "<h4>Al momento non ci sono eventi in programma</h4>";
                            }
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
                        
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Pignata Marcello, tutti i diritti riservati</p>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </footer>
        
        <div id="ftco-loader" class="show fullscreen">
            
            <svg class="circular" width="48px" height="48px">
                
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
                
            </svg>
            
        </div>
        
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