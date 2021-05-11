<?php
    session_start();

    // connessione iniziale al database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ascari-elaborazioni";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){echo "<script>alert('errore php')</script>";}




    //  LOGIN

        if(isset($_POST["login"]))
        {
            // ricerco l'utente nel database
            $sql = "SELECT * FROM utenti WHERE email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1)
            {
                // se lo trovo salvo il suo id nella sessione e ritorno alla pagina di partenza
                $utente = $result->fetch_assoc();
                $_SESSION["id_utente"] = $utente["id"];
                $_SESSION["nome"] = $utente["nome"];
                $_SESSION["cognome"] = $utente["cognome"];
                header('Location: '.$_SESSION["page"].'.php');
                exit();
            }
            else
            {
                // utente non trovato
                header('Location: login.php?failed=1');
                exit();
            }
        }




    // REGISTRAZIONE

        else if(isset($_POST["registrazione"]))
        {
            // verifico che la mail non sia già registrata
            $sql = "SELECT * FROM utenti WHERE email = '".$_POST["email"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                // se è già registrata ritorno alla registrazione e avviso dell'errore
                header('Location: registrazione.php?alreadyexist=1');
                exit();
            }
            
            else
            {
                // inserisco il nuovo utente
                $sql = "INSERT INTO utenti (id, email, password, nome, cognome, telefono) VALUES (DEFAULT, '".$_POST["email"]."', '".$_POST["password1"]."', '".$_POST["nome"]."', '".$_POST["cognome"]."', '".$_POST["telefono"]."')";
                if ($conn->query($sql) === TRUE)
                {
                    // inserisco il nuovo id nella sessione e ritorno alla pagina di partenza
                    $_SESSION["id_utente"] = $conn->insert_id;
                    $_SESSION["nome"] = $_POST["nome"];
                    $_SESSION["cognome"] = $_POST["cognome"];
                    header('Location: '.$_SESSION["page"].'.php');
                    exit();
                }
                else
                {
                    // errore
                    header('Location: registrazione.php?error=1');
                    exit();
                }
            }
        }



    // ELABORAZIONE PERSONALIZZATA

        else if(isset($_POST["elaborazione_personalizzata"]))
        {
            // ottengo tutti i dati inviati dal form
            $id_utente = $_SESSION["id_utente"];
            $id_automobile = $_POST["id_automobile"];
            $targa = $_POST["targa"];
            $data = $_POST["data"];
            $bancaggio = isset($_POST["bancaggio"]);
            $preventivo = $_POST["preventivo"];

            // inserisco la nuova prenotazione
            $sql = "INSERT INTO prenotazioni_elaborazioni (id, id_utente, id_automobile, targa, data, bancaggio, preventivo, stato)
            VALUES (DEFAULT, '".$id_utente."', '".$id_automobile."', '".$targa."', '".$data."', '".$bancaggio."', '".$preventivo."', 'da ricevere')";
            
            
            //ottengo l'ID creato
            if ($conn->query($sql) === TRUE){$id_prenotazione = $conn->insert_id;}
            else {header('Location: prenota.php?error=1');exit();} // errore

            /*
             *
             *      TODO: ottimizzare i cicli (il secondo for non è neccessario, posso trasferirlo dentro il primo while)
             *
             */
            
            // ottengo tutte le categorie di parti disponibili per la macchina selezionata
            $sql = "SELECT * FROM parti WHERE id_automobile = ".$id_automobile." GROUP BY categoria";
            $result = $conn->query($sql);
            $categorie = array();
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()){array_push($categorie,$row);}
            }
            else {header('Location: prenota.php?error=1');exit();}

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
            
            // ritorno alla pagina delle prenotazioni
            header('Location: prenota.php?success=1');
            exit();
        }




    // ELABORAZIONE KIT

        else if(isset($_POST["elaborazione_kit"]))
        {
            // ottengo tutti i dati inviati dal form
            $id_utente = $_SESSION["id_utente"];
            $id_automobile = $_POST["id_automobile"];
            $targa = $_POST["targa"];
            $data = $_POST["data"];
            $bancaggio = isset($_POST["bancaggio"]);
            $preventivo = $_POST["preventivo"];
            $id_kit = $_POST["id_kit"];

            // inserisco la nuova prenotazione e ottengo l'ID creato
            $sql = "INSERT INTO prenotazioni_elaborazioni (id, id_utente, id_automobile, targa, data, bancaggio, preventivo, stato)
            VALUES (DEFAULT, '".$id_utente."', '".$id_automobile."', '".$targa."', '".$data."', '".$bancaggio."', '".$preventivo."', 'da ricevere')";

            //ottengo l'ID creato
            if ($conn->query($sql) === TRUE){$id_prenotazione = $conn->insert_id;}
            else {header('Location: prenota.php?error=1');exit();} // errore

            // ottengo tutte le parti contenute nel kit selezionato
            $sql = "SELECT * FROM parti_kit WHERE id_kit = ".$id_kit;
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    // inserisco ogni parte collegata alla prenotazione nel database
                    $id_parte = $row["id_parte"];
                    $sql = "INSERT INTO parti_prenotazioni (id_prenotazione, id_parte) VALUES ('".$id_prenotazione."', '".$id_parte."')";

                    if (!$conn->query($sql) === TRUE){header('Location: prenota.php?error=1');exit();}
                }
            } else {header('Location: prenota.php?error=1');exit();}

            // ritorno alla pagina delle prenotazioni
            header('Location: prenota.php?success=1');
            exit();
        }




    // PRENOTAZIONE PROVA SU BANCO

        else if(isset($_POST["banco"]))
        {
            // ottengo tutti i dati inviati dal form
            $id_utente = $_SESSION["id_utente"];
            $data = $_POST["data"];
            $ora = $_POST["ora"];
            
            // inserisco la prenotazione nel database
            $sql = "INSERT INTO prenotazioni_banco (id, id_utente, data, ora) VALUES (DEFAULT, '".$id_utente."', '".$data."', '".$ora."')";
            if($conn->query($sql) === TRUE)
            {
                header('Location: banco.php?success=1');
                exit();
            }
            else
            {
                header('Location: banco.php?error=1');
                exit();
            }
        }




    // REGISTRAZIONE EVENTI

        else if(isset($_POST["iscrizione_evento"]))
        {
            // ottengo tutti i dati inviati dal form
            $id_utente = $_SESSION["id_utente"];
            $id_evento = $_POST["id_evento"];
            
            // inserisco l'iscrizione nel database
            $sql = "INSERT INTO iscrizioni_eventi (id_evento, id_utente) VALUES ('".$id_evento."', '".$id_utente."')";
            if($conn->query($sql) === TRUE)
            {
                header('Location: eventi.php?successinsert=1');
                exit();
            }
            else
            {
                header('Location: eventi.php?error=1');
                exit();
            }
        }




    // DISISCRIZIONE EVENTI

        else if(isset($_POST["disiscrizione_evento"]))
        {
            
            // ottengo tutti i dati inviati dal form
            $id_utente = $_SESSION["id_utente"];
            $id_evento = $_POST["id_evento"];
            
            // elimino l'iscrizione dal database
            $sql = "DELETE FROM iscrizioni_eventi WHERE id_evento='".$id_evento."' AND id_utente='".$id_utente."'";
            if($conn->query($sql) === TRUE)
            {
                header('Location: eventi.php?successdelete=1');
                exit();
            }
            else
            {
                header('Location: eventi.php?error=1');
                exit();
            }
        }
?>