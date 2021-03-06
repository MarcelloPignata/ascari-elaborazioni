<?php session_start();?>

<!DOCTYPE html>

<html lang="it">
    
    <head>
        
        <title>Ascari Elaborazioni</title>
        
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/style.css">

        <link rel="icon" type="image/png" href="images/logo.png">

        <style class="cp-pen-styles">
            
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            form
            {
                text-align: center;
            }

            .btn
            {
                display: inline-block;
                *display: inline;
                *zoom: 1;
                padding: 4px 10px 4px;
                margin-bottom: 0;
                font-size: 13px;
                line-height: 18px;
                color: #333333;
                text-align: center;
                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                vertical-align: middle;
                background-color: #f5f5f5;
                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
                background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: linear-gradient(top, #ffffff, #e6e6e6);
                background-repeat: repeat-x;
                filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
                border-color: #e6e6e6 #e6e6e6 #e6e6e6;
                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                border: 1px solid #e6e6e6;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                cursor: pointer;
                *margin-left: .3em;
                }

                .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled]
                {
                background-color: #e6e6e6;
                }

                .btn-large
                {
                padding: 9px 14px;
                font-size: 15px;
                line-height: normal;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px; 
            }

            .btn:hover
            {
                color: #333333;
                text-decoration: none;
                background-color: #e6e6e6;
                background-position: 0 -15px;
                -webkit-transition: background-position 0.1s linear;
                -moz-transition: background-position 0.1s linear;
                -ms-transition: background-position 0.1s linear;
                -o-transition: background-position 0.1s linear;
                transition: background-position 0.1s linear;
            }

            .btn-block
            {
                width: 100%; display:block;
            }

            *
            {
                -webkit-box-sizing:border-box;
                -moz-box-sizing:border-box;
                -ms-box-sizing:border-box;
                -o-box-sizing:border-box;
                box-sizing:border-box;
            }

            html
            {
                width: 100%;
                height:100%;
                overflow:hidden;
            }

            body
            { 
                width: 100%;
                height:100%;
                font-family: 'Open Sans', sans-serif;
                background: linear-gradient(45deg, rgba(255,255,255,1) 0%, rgba(172,240,218,1) 50%, rgba(1,210,142,1) 100%);
            }

            .login { 
                position: absolute;
                top: 30%;
                left: 50%;
                margin: -150px 0 0 -150px;
                width:300px;
                height:300px;
            }

            .login h1
            {
                color: #fff;
                text-shadow: 0 0 10px rgba(0,0,0,0.3);
                letter-spacing:1px;
                text-align:center;
            }

            input
            { 
                width: 100%; 
                margin-bottom: 10px; 
                background: rgba(0,0,0,0.3);
                border: none;
                outline: none;
                padding: 10px;
                font-size: 13px;
                color: #c2c1be;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
                border: 1px solid rgba(0,0,0,0.3);
                border-radius: 4px;
                box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
                -webkit-transition: box-shadow .5s ease;
                -moz-transition: box-shadow .5s ease;
                -o-transition: box-shadow .5s ease;
                -ms-transition: box-shadow .5s ease;
                transition: box-shadow .5s ease;
            }

            input:focus
            {
                box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2);
            }

            input::placeholder 
            { 
                color: #c2c1be;
                opacity: 1;
            }
            
        </style>

        <script>

            // abilita o disabilita l'input per la seconda password
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

            // effettua tutti i controlli sui dati inseriti
            function Controlli()
            {
                var p = document.getElementById("errore");

                var nome = document.getElementById("nome");
                var cognome = document.getElementById("cognome");
                var telefono = document.getElementById("telefono");
                var email = document.getElementById("email");
                var password1 = document.getElementById("password1");
                var password2 = document.getElementById("password2");

                p.innerHTML = "";

                nome.style.borderColor = "rgba(255,0,0,1)";
                cognome.style.borderColor = "rgba(255,0,0,1)";
                telefono.style.borderColor = "rgba(255,0,0,1)";
                email.style.borderColor = "rgba(255,0,0,1)";
                password1.style.borderColor = "rgba(255,0,0,1)";
                password2.style.borderColor = "rgba(255,0,0,1)";


                // NOME
                if(nome.value == "")
                {
                    p.innerHTML += "Inserisci un nome<br>";
                }
                else if(!/^[a-zA-Z\s]*$/.test(nome.value))
                { 
                    p.innerHTML += "Inserisci un nome valido<br>";
                }
                else if(nome.value.length > 20)
                {
                    p.innerHTML += "Inserisci un nome pi?? corto<br>";
                }
                else
                {
                    nome.style.borderColor = "rgba(0,0,0,0.3)";
                }

                // COGNOME
                if(cognome.value == "")
                {
                    p.innerHTML += "Inserisci un cognome<br>";
                }
                else if(!/^[a-zA-Z\s]*$/.test(cognome.value))
                { 
                    p.innerHTML += "Inserisci un cognome valido<br>";
                }
                else if(cognome.value.length > 20)
                {
                    p.innerHTML += "Inserisci un cognome pi?? corto<br>";
                }
                else
                {
                    cognome.style.borderColor = "rgba(0,0,0,0.3)";
                }

                // TELEFONO
                if(telefono.value == "")
                {
                    p.innerHTML += "Inserisci un numero di telefono<br>";
                }
                else if(!/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g.test(telefono.value) || telefono.value.length < 10)
                { 
                    p.innerHTML += "Inserisci un numero di telefono valido<br>";
                }
                else if(telefono.value.length > 20)
                {
                    p.innerHTML += "Inserisci un numero pi?? corto<br>";
                }
                else
                {
                    telefono.style.borderColor = "rgba(0,0,0,0.3)";
                }

                // EMAIL
                if(email.value == "")
                {
                    p.innerHTML += "Inserisci una mail<br>";
                }
                else if(!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(email.value))
                { 
                    p.innerHTML += "Inserisci una mail valida<br>";
                }
                else if(email.value.length > 254)
                {
                    p.innerHTML += "Inserisci una mail pi?? corta<br>";
                }
                else
                {
                    email.style.borderColor = "rgba(0,0,0,0.3)";
                }

                //PASSWORD
                if(password1.value == "")
                {
                    p.innerHTML += "Inserisci una password<br>";
                }
                else if (password1.value != password2.value)
                {
                    p.innerHTML += "Le password non coincidono<br>";
                }
                else if(password1.value.length > 20)
                {
                    p.innerHTML += "Inserisci una password pi?? corta<br>";
                }
                else
                {
                    password1.style.borderColor = "rgba(0,0,0,0.3)";
                    password2.style.borderColor = "rgba(0,0,0,0.3)";
                }

                if (p.innerHTML == "")
                {
                    document.getElementById("submit").click();
                }

                
                // se presente, cancello i messaggi di errore delle query
                try
                {
                    document.getElementById("phperror").innerHTML = "";
                }
                catch(error){}
            }

        </script>
        
    </head>
    
    <body>

    <div class="hero-wrap ftco-degree-bg" data-stellar-background-ratio="0.5">
        
        <div class="overlay"></div>
        
        <div class="container">
            
            <div class="login">
                
                <form action="query.php" method="post">
                    
                    <p><img src="images/logo_AE.png" style="height: 10vh"></p>
                    <input type="text" name="nome" id="nome" placeholder="Nome" required/>
                    <input type="text" name="cognome" id="cognome" placeholder="Cognome" required/>
                    <input type="text" name="telefono" id="telefono" placeholder="Telefono" required/>
                    <input type="text" name="email" id="email" placeholder="Email" required="required" />
                    <input type="password" name="password1" id="password1" placeholder="Password" oninput="enablePassword2();"  required/>
                    <input type="password" name="password2" id="password2" placeholder="Ripeti password" required disabled/>
                    <button type="button" class="btn btn-block btn-large" onclick="Controlli();">Registrati</button>
                    <button type="submit" name="registrazione" id="submit" hidden></button>
                    <br>
                    <p style="color:white;">Gi?? registrato? <a href="login.php" style="color: #09825b ; font-weight: bold;">Accedi!</a></p>
                    <p style="color: #d90000;" id="errore"></p>
                    
                    <?php
                    
                        if(isset($_GET["alreadyexist"]))
                        {
                            echo '<p style="color: #d90000;" id="phperror">Email gi?? registrata</p>';
                        }
                        if(isset($_GET["failed"]))
                        {
                            echo '<p style="color: #d90000;" id="phperror">Errore nella registrazione</p>';
                        }
                    
                    ?>
                    
                </form>
                
            </div>
            
        </div>
        
    </div>
        
    </body>
    
</html>