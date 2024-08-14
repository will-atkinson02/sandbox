<?php
declare(strict_types=1);

require_once 'getwinner.php';
require_once 'deckbuilder.php';
require_once 'shuffleassoc.php';

// Create deck
$cards = deckBuilder();
// Shuffle deck
shuffleAssoc($cards);


$selectedCardsOne = array_rand($cards, 2);
$selectedCardsTwo = array_rand($cards, 2);

$playerOneTotal = $cards[$selectedCardsOne[0]] + $cards[$selectedCardsOne[1]];
$playerTwoTotal = $cards[$selectedCardsTwo[0]] + $cards[$selectedCardsTwo[1]];

echo "[Player 1] - " . "[Cards: $selectedCardsOne[0], $selectedCardsOne[1]] - " . "[Total: $playerOneTotal]" . '<br />';
echo "[Player 2] - " . "[Cards: $selectedCardsTwo[0], $selectedCardsTwo[1]] - " . "[Total: $playerTwoTotal]" . '<br /><br />';
echo getBlackJackWinner($playerOneTotal, $playerTwoTotal);


