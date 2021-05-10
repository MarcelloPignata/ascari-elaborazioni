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
        if ($result->num_rows == 1)
        {
            $utente = $result->fetch_assoc();
            $_SESSION["id_utente"] = $utente["id"];
            $_SESSION["email"] = $utente["email"];
            $_SESSION["nome"] = $utente["nome"];
            $_SESSION["cognome"] = $utente["cognome"];
            $_SESSION["telefono"] = $utente["telefono"];
            header('Location: '.$_SESSION["page"].'.php');
            exit();
        }
        else
        {
            header('Location: login.php?failed=1');
            exit();
        }
    }

    else if(isset($_POST["registrazione"]))
    {
        $sql = "SELECT * FROM utenti WHERE email = '".$_POST["email"]."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            header('Location: registrazione.php?alreadyexist=1');
            exit();
        }
        else
        {
            $sql = "INSERT INTO utenti (id, email, password, nome, cognome, telefono) VALUES (DEFAULT, '".$_POST["email"]."', '".$_POST["password1"]."', '".$_POST["nome"]."', '".$_POST["cognome"]."', '".$_POST["telefono"]."')";

            if ($conn->query($sql) === TRUE)
            {
                $_SESSION["id_utente"] = $conn->insert_id;
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["nome"] = $_POST["nome"];
                $_SESSION["cognome"] = $_POST["cognome"];
                $_SESSION["telefono"] = $_POST["telefono"];
                header('Location: '.$_SESSION["page"].'.php');
                exit();
            }
            else
            {
                header('Location: registrazione.php?error=1');
                exit();
            }
        }
    }

    if(isset($_POST["elaborazione_personalizzata"]))
    {
        // ottengo tutti i dati inviati dal form
        $id_utente = $_SESSION["id_utente"];
        $id_automobile = $_POST["id_automobile"];
        $targa = $_POST["targa"];
        $data = $_POST["data"];
        $bancaggio = isset($_POST["bancaggio"]);
        $preventivo = $_POST["preventivo"];
        
        // inserisco la nuova prenotazione e ottengo l'ID creato
        $sql = "INSERT INTO prenotazioni_elaborazioni (id, id_utente, id_automobile, targa, data, bancaggio, preventivo, stato) VALUES (DEFAULT, '".$id_utente."', '".$id_automobile."', '".$targa."', '".$data."', '".$bancaggio."', '".$preventivo."', 'da ricevere')";

        if ($conn->query($sql) === TRUE)
        {
            $id_prenotazione = $conn->insert_id;
        }
        else {header('Location: prenota.php?error=1');exit();}
        
        // ottengo tutte le categorie di parti disponibili per la macchina selezionata
        $sql = "SELECT * FROM parti WHERE id_automobile = ".$id_automobile." GROUP BY categoria";
        $result = $conn->query($sql);
        $categorie = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            array_push($categorie,$row);}
        } else {header('Location: prenota.php?error=1');exit();}
        
        // aggiungo ognuna delle parti selezionate nella tabella parti_prenotazioni
        for ($i = 0; $i < count($categorie); $i++)
        {
            $id_parte = $_POST[str_replace(' ', '', $categorie[$i]["categoria"])];
                
            if( $id_parte != "" )
            {
                $sql = "INSERT INTO parti_prenotazioni (id_prenotazione, id_parte) VALUES ('".$id_prenotazione."', '".$id_parte."')";

                if (!$conn->query($sql) === TRUE){header('Location: prenota.php?error=1');exit();}
            }
        }
        
        header('Location: prenota.php?success=1');
        exit();
        
    }

    if(isset($_POST["elaborazione_kit"]))
    {
        echo "<script>alert('kit')</script>";
    }
?>