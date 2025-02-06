<?php
    require "../../normal/vectors.php";

    use ZKutils\Vectors\Vector;
    use ZKutils\Vectors\Vector_custom;

    /*
        STRUTTURA VETTORI

        trappola, armi, materiali, eroi

    */

    $utenteA = new Vector_custom([0.2, 0.8, 0, 0, 0]); // utente che preferisce le armi

    $fucile = new Vector_custom([0, 1, 0, 0, 0]);
    $trappola = new Vector_custom([1, 0, 0, 0, 0]);

    $punteggio1 = $utenteA->similarity($fucile);
    $punteggio2 = $utenteA->similarity($trappola);
    
    echo "Punteggio Fucile: $punteggio1<br>";
    echo "Punteggio Trappola: $punteggio2<br>";
    