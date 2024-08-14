<?php
declare(strict_types=1);

function getBlackJackWinner(int $player1, int $player2): string {
    if ($player1 === $player2 || $player2 > 21 && $player1 > 21) {
        return 'Its a draw' . '<br />';
    } elseif ($player1 > $player2 && $player1 <= 21 || $player2 > 21) {
        return 'Player 1 wins' . '<br />';
    }
    return 'Player 2 wins' . '<br />';
}

//echo getBlackJackWinner(23, 19);
//echo getBlackJackWinner(11, 19);
//echo getBlackJackWinner(19, 23);
//echo getBlackJackWinner(23, 23);
//echo getBlackJackWinner(19, 19);