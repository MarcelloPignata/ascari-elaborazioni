<?php
    session_start();

    if($_SESSION["page"] == "prenotazioni")
    {
        $_SESSION["page"] = "index";
    }

    session_destroy();

    header('Location: '.$_SESSION["page"].'.php');
?>