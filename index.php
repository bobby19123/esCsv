<?php
    $file = fopen("log.csv", "r");
    if(!$file){ // Equivale a $file === false
        die("Errore nell'apertura del file");
        // die($msg) interrompe l'esecuzione dello script 
        // viene stampato a schermo il messaggio $msg
    }
    // Non mi serve avere un ramo else perchè in caso di errore
    // Lo script viene interrotto a riga 4

    // Se il file esiste e viene aperto correttamente:
    while(!feof($file)){ // feof($file) === false
        $row = fgets($file);

        // devo usare explode con "," come separatore
        // e $row come stringa da separare
        // avrò in output un array di stringhe da visualizzare
        // nella <tr></tr>. Ciascun elemento di questo array
        // dev'essere in una cella <td></td>
        echo $row;
        echo "<br />";
        // Questo ciclo viene eseguito finchè il file ha dei contenuti da leggere
    }

    fclose($file);



?>