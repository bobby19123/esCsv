<?php

    // fopen apre il file "log.csv" in modalità sola lettura ("r").
    // Restituisce una risorsa di file se ha successo, oppure false se fallisce.
    $file = fopen("log.csv", "r");

    if(!$file){ 
        die("Errore nell'apertura del file");
        // die() interrompe l'esecuzione dello script 
        // viene stampato a schermo il messaggio 
    }
    
    // Stampiamo il tag di apertura della tabella PRIMA del ciclo while.
    // Se lo mettessimo dentro il ciclo, creerebbe una tabella nuova per ogni riga.
    echo "<table border='1'>";

    // Se il file esiste e viene aperto correttamente:
    while(!feof($file)){ // feof($file) === false (continua finché il file NON è finito)
        
        // fgets legge la riga corrente del file CSV come una singola stringa di testo
        $row = fgets($file);

        // devo usare explode con "," come separatore
        // e $row come stringa da separare
        // avrò in output un array di stringhe da visualizzare
        // nella <tr></tr>. Ciascun elemento di questo array
        // dev'essere in una cella <td></td>
        
        // explode() prende la stringa $row e la "spezza" ogni volta che trova una virgola.
        // Risultato: $celle diventa un array (es. ["Mario", "Rossi", "25"])
        $celle = explode(",", $row);

        // Stampiamo l'apertura della riga HTML (Table Row)
        echo "<tr>";

        // Con foreach sccorriamo uno alla volta tutti gli elementi presenti nell'array $celle
        foreach ($celle as $cella) {
            // Per ogni elemento, stampiamo il tag <td>, il valore estratto e la chiusura </td>
            echo "<td>" . $cella . "</td>";
        }

        // Stampiamo la chiusura della riga HTML
        echo "</tr>";

        // Questo ciclo viene eseguito finchè il file ha dei contenuti da leggere
    }

    echo "</table>";

    // Chiudiamo la risorsa file aperta all'inizio per liberare la memoria del server.
    fclose($file);
?>