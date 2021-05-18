# Ascari Elaborazioni
ascari-elaborazioni è il portale web dell'officina fittizia "Ascari Elaborazioni". Questo progetto rappresenta la porzione di codice significativa sviluppata da Pignata Marcello, della classe 5^B Informatica dell'IIS Jean Monnet, Mariano Comense (CO), per l'elaborato dell'Esame di Stato conclusivo del corso di studio di istruzione secondaria superiore dell'anno scolastico 2020-2021.

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
	 
TODO (spiegare varie sezioni e cosa fanno)

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
