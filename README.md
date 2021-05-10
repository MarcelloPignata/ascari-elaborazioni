# ascari-elaborazioni
Portale web dell'officina fittizia "Ascari Elaborazioni", progetto di maturità di Pignata Marcello per l'IIS Jean Monnet, Mariano Comense (CO) per l'anno scolastico 2020-2021

## Query notevoli

Visualizza tutte le prenotazione e le rispettive parti
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
