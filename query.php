<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ascari-elaborazioni";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST["login"]))
    {
        $sql = "SELECT * FROM utenti WHERE email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'";
        $result = $conn->query($sql);
        $automobili = array();
        if ($result->num_rows == 1)
        {
            $utente = $result->fetch_assoc();
            $_SESSION["email"] = $utente["email"];
            $_SESSION["nome"] = $utente["nome"];
            $_SESSION["cognome"] = $utente["cognome"];
            $_SESSION["telefono"] = $utente["telefono"];
            header('Location: '.$_SESSION["page"].'.php');
        }
        else
        {
            header('Location: login.php?failed=1');
        }
    }

    if(isset($_POST["registrazione"]))
    {
        $sql = "SELECT * FROM utenti WHERE email = '".$_POST["email"]."'";
        $result = $conn->query($sql);
        $automobili = array();
        if ($result->num_rows > 0)
        {
            header('Location: registrazione.php?failed=1');
        }
        else
        {
            $sql = "INSERT INTO utenti (id, email, password, nome, cognome, telefono) VALUES (DEFAULT, '".$_POST["email"]."', '".$_POST["password1"]."', '".$_POST["nome"]."', '".$_POST["cognome"]."', '".$_POST["telefono"]."')";

            if ($conn->query($sql) === TRUE)
            {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["nome"] = $_POST["nome"];
                $_SESSION["cognome"] = $_POST["cognome"];
                $_SESSION["telefono"] = $_POST["telefono"];
                header('Location: '.$_SESSION["page"].'.php');
            }
            else
            {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>