<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Ascari Elaborazioni</title>
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="css/style.css">
      
    <link rel="icon" type="image/png" href="images/logo.png">
      
      <meta charset='UTF-8'>
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
                top: 40%;
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
            
            input::placeholder { 
              color: #c2c1be;
              opacity: 1;
            }
        </style>
  </head>
  <body>
    
    <div class="hero-wrap ftco-degree-bg" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
          <div class="login">
            <h1></h1>
            <form action="query.php" method="post">
                <p><img src="images/logo_AE.png" style="height: 10vh"></p>
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password"/>
                <button type="submit" name="login" class="btn btn-block btn-large">Login</button>
                <br>
                <p style="color:white;">Altrimenti, <a href="registrazione.php" style="color: #09825b ; font-weight: bold;">registrati!</a></p>
                
                <?php
                    if(isset($_GET["failed"]))
                    {
                        echo '<p style="color: #d90000;">Nome utente o password errata</p>';
                    }
                ?>
            </form>
      </div>
    </div>
    </div>
  </body>
</html>