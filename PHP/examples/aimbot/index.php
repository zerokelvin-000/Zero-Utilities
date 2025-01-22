<?php
    require "player.php";
    require "../../utils.php";

    use ZKutils\Utils\Numbers;

    $player1 = new Player(8,2,-153.43);
    $player2 = new Player(11,6,0);

    $output = $player1->aim_to($player2, true);

    echo "Il giocatore deve orientarsi all'angolazione di ".
    Numbers::format($output[1], 4)." gradi, che è a ".
    Numbers::format($output[0], 4)." gradi da dove sta guardando ora.";