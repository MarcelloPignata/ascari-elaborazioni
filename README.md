# Ascari Elaborazioni
ascari-elaborazioni è il portale web dell'officina fittizia "Ascari Elaborazioni". Questo progetto rappresenta la porzione di codice significativa sviluppata da Pignata Marcello, della classe 5^B Informatica dell'IIS Jean Monnet, Mariano Comense (CO), per l'elaborato dell'Esame di Stato conclusivo del corso di studio di istruzione secondaria superiore dell'anno scolastico 2020-2021. Per una più completa illustrazione dello scopo e della struttura della piattaforma si rimanda alla lettura del documento "Ascari Elaborazioni.pdf"

## Indice

* [Utilizzo](#utilizzo)
* [Installazione](#installazione)
* [Stato di sviluppo](#stato-di-sviluppo)
* [Query notevoli](#query-notevoli)
* [Contributi](#contributi)
* [Crediti](#crediti)
* [Licenza](#licenza)
* [Ringraziamenti](#ringraziamenti)

## Utilizzo
	 
La piattaforma ha lo scopo di permettere l'interazione con una base di dati da me sviluppata, e per fare ciò viene vengono proposte una serie di pagine e funzionalità suddivise nelle seguenti sezioni:
* **Homepage**: una semplice pagina introduttiva del sito, contenente una breve presentazione dell’officina e dei servizi offerti e i collegamenti a tutte le altre sezioni.
* **Prenotazione elaborazione**: è qui possibile inserire nel database una prenotazione di elaborazione, selezionando il modello di veicolo e le parti tra quelli disponibili nel database. Per la selezione delle parti, sono previste due alternative:
  * *Elaborazione personalizzata*: consiste nella selezione delle singole parti presenti sul database e associate al modello di veicolo selezionato.
  * *Selezione kit*: consiste nella selezione di uno tra i kit presenti nel database e associato al modello di veicolo selezionato. Un kit consiste in un insieme di parti selezionate per uno stesso veicolo.
* **Prove su banco**: è qui possibile inserire nel database una prenotazione di prova su banco
* **Eventi**: è qui possibile la visualizzazione di tutti gli eventi presenti nel database e l'iscrizione / disiscrizione degli utenti ad essi
* **Accesso e registrazione**
  * *Accesso*: è da qui possibile interrogare il database con una email e password, qualora sia presente un utente registrato con tali dati verrà correttamente effettuato l'accesso con tale utente alla piattaforma, al quale verranno associate tutte le prenotazioni ed iscrizioni che effettuerà mentre è loggato
  * *Registrazione*: è da qui possibile inserire nel database un nuovo utente, effettuando i dovuti controlli sui dati inseriti che il caso richiede
* **Area utente**: consiste in un pannello di controllo del proprio profilo per un utente che ha effettuato l'accesso, e prevede quattro funzioni:
  * *Visualizza prenotazioni*: rimanda ad una pagina dove è possibile visualizzare tutte le prenotazioni ed iscrizioni del database associate al profilo dell'utente attualmente loggato, viene prevista la possibile per l'utente di eliminare ciascuna di esse e tutti i dati ad esse associate anche in tabelle esterne
  * *Modifica dati*: rimanda ad una pagina dove è possibile visualizzare ed eventualmente modificare tutti i dati associati al profilo dell'utente attualmente loggato, viene inoltre prevista la possibilità di eliminare il profilo e con esso tutti i dati ad esso associati anche in tabelle esterne
  * *Modifica password*: rimanda ad una pagina dove è possibile modificare la password associata al profilo dell'utente attualmente loggato, con le dovute misure di sicurezza che il caso richiede
  * *Disconnettiti*: effettua la disconnessione dal profilo dell'utente attualmente loggato per la sessione attuale
* **Amministrazione**: consiste in un secondo portale, separato dalla pagina accessibile dagli utenti e accessibile solo tramite credenziali di amministratore, dove sarà possibile visualizzare, modificare ed eliminare tutti i dati presenti sul database. Esso è suddivisa nelle seguenti sezioni, che corrispondono alle singole entità presenti sul database:
  * *Gestione prenotazioni elaborazioni*
  * *Gestione prenotazioni banco*
  * *Gestione utenti*
  * *Gestione eventi*
  * *Gestione automobili*
  * *Gestione parti*
  * *Gestione kit*

## Installazione
* Per il completo e corretto funzionamento del portale tramite installazione in locale è necessaria l'installazione del software [XAMPP](https://www.apachefriends.org/).
* Una volta installato e aperto il programma sarà necessario avviare i moduli  "Apache" e "MySQL".
* Si procede ora a clonare la repository all'interno della cartella htdocs di XAMPP, che solitamente si trova all'indirizzo `C:\xampp\htdocs`.
* Utilizzando un qualsiasi browser si dovrà poi accedere alla piattaforma di phpMyAdmin all'indirizzo `localhost/phpmyadmin`.
* Tramite phpMyAdmin si dovrà creare un nuovo database chiamato "ascari-elaborazioni", e effettuare l'importazione del database utilizzando il file "ascari-elaborazioni.sql", presente tra i file del progetto.
* Il portale sarà ora funzionante e accessibile tramite browser all'indirizzo `localhost/ascari-elaborazioni`

## Stato di sviluppo
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Homepage: `terminata`
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Prenota elaborazione: `terminata`
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Personalizzata
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Kit
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Prove su banco: `terminata`
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Eventi: `terminata`
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Login: `terminata`
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Accesso
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Registrazione
* ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Area Utente: `terminata`
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Visualizzazione prenotazioni:
    * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Elaborazioni
    * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Banco
    * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Eventi
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Modifica dati:
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Modifica password:
  * ![#00ff00](https://via.placeholder.com/15/00ff00/000000?text=+) Disconnessione:
* ![#ff0000](https://via.placeholder.com/15/ff0000/000000?text=+) Amministrazione: `da implementare`

## Query notevoli

* Visualizza tutte le prenotazioni di elaborazioni e le parti ad esse collegate
```sql
SELECT 	pre.id AS 'ID prenotazione',
	ute.nome AS 'Nome',
        ute.cognome AS 'Cognome',
        aut.modello AS 'Auto',
        pre.targa AS 'Targa',
        pre.data AS 'Data',
        pre.bancaggio AS 'Bancaggio',
        pre.preventivo AS 'Preventivo',
        par.nome AS 'Parte'
FROM prenotazioni_elaborazioni pre
INNER JOIN parti_prenotazioni par_pre
    on pre.id = par_pre.id_prenotazione
INNER JOIN parti par
    on par_pre.id_parte = par.id
INNER JOIN utenti ute
    on pre.id_utente = ute.id
INNER JOIN automobili aut
    on pre.id_automobile = aut.id
```

* Visualizza tutte le prenotazioni del banco di prova
```sql
SELECT  pre.id AS 'ID prenotazione',
        ute.nome AS 'Nome',
        ute.cognome AS 'Cognome',
        pre.data AS 'Data',
        pre.ora AS 'Ora'
FROM prenotazioni_banco pre
INNER JOIN utenti ute
    on pre.id_utente = ute.id
```

* Visualizza tutte le iscrizioni agli eventi
```sql
SELECT  ute.nome AS 'Nome',
        ute.cognome AS 'Cognome',
        eve.nome AS 'Evento'
FROM iscrizioni_eventi isc
INNER JOIN utenti ute
    on isc.id_utente = ute.id
INNER JOIN eventi eve
    on isc.id_evento = eve.id
```

## Contributi
Essendo questo un progetto personale e soggetto a valutazione, non mi è possibile accettare contributi.

Sono ben accette segnalazioni di bug e difetti tramite l'apertura di issue.

## Crediti
La base estetica della piattaforma è una versione modificata di un template di Bootstrap a cura di [joefrey](https://colorlib.com/wp/author/joefreymahusay/).

La base estetica delle schermate di login e registrazione è una versione modificata di un template di Bootstrap a cura di [evarevirus](https://bootsnipp.com/evarevirus).

L'icona visualizzata accanto al nome dell'utente dopo aver effettuato l'accesso è a cura di [freepik](https://www.flaticon.com/authors/freepik).

Le immagini di sfondo sono state ottenute tramite il motore di ricerca Google.

Tutto il resto del codice (struttura del database, elementi delle pagine, estetica e funzionamento dei form, comunicazione coi database tramite PHP, interazione e comunicazione tra pagine, etc...) è stato scritto interamente da me.

## Licenza
Copyright (c) 2021 Pignata Marcello

Con la presente si concede, a chiunque ottenga una copia di questo software e dei file di documentazione associati (il "Software"), l'autorizzazione a usare gratuitamente il Software senza alcuna limitazione, compresi i diritti di usare, copiare, modificare, unire, pubblicare, distribuire, cedere in sottolicenza e/o vendere copie del Software, nonché di permettere ai soggetti cui il Software è fornito di fare altrettanto, alle seguenti condizioni:

L'avviso di copyright indicato sopra e questo avviso di autorizzazione devono essere inclusi in ogni copia o parte sostanziale del Software.

IL SOFTWARE VIENE FORNITO "COSÌ COM'È", SENZA GARANZIE DI ALCUN TIPO, ESPLICITE O IMPLICITE, IVI INCLUSE, IN VIA ESEMPLIFICATIVA, LE GARANZIE DI COMMERCIABILITÀ, IDONEITÀ A UN FINE PARTICOLARE E NON VIOLAZIONE DEI DIRITTI ALTRUI. IN NESSUN CASO GLI AUTORI O I TITOLARI DEL COPYRIGHT SARANNO RESPONSABILI PER QUALSIASI RECLAMO, DANNO O ALTRO TIPO DI RESPONSABILITÀ, A SEGUITO DI AZIONE CONTRATTUALE, ILLECITO O ALTRO, DERIVANTE DA O IN CONNESSIONE AL SOFTWARE, AL SUO UTILIZZO O AD ALTRE OPERAZIONI CON LO STESSO.

## Ringraziamenti
TODO
