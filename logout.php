<?php
    if($_SESSION["page"] == "prenotazioni")
    {$_SESSION["page"] = "index"};
    session_start();
    session_destroy();
    header('Location: '.$_SESSION["page"].'.php');
?>