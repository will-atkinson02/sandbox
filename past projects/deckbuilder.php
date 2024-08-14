<?php
declare(strict_types=1);

function deckBuilder(): array {
    $fullDeck = [];
    $suits = ['Hearts', 'Diamonds', 'Spades', 'Clubs'];
    $cardsAndScores = [
        'Ace' => 21,
        'Two' => 2,
        'Three' => 3,
        'Four' => 4,
        'Five' => 5,
        'Six' => 6,
        'Seven' => 7,
        'Eight' => 8,
        'Nine' => 9,
        'Ten' => 10,
        'Jack' => 10,
        'Queen' => 10,
        'King' => 10,
    ];
    foreach ($suits as $suit) {
        foreach ($cardsAndScores as $key => $card) {
            $name = "$key " . 'of ' . "$suit";
            $fullDeck[$name] = $card;
        }
    }
    return $fullDeck;
}

//deckBuilder();

//echo getBlackJackWinner(23, 19);
//echo getBlackJackWinner(11, 19);
//echo getBlackJackWinner(19, 23);
//echo getBlackJackWinner(23, 23);
//echo getBlackJackWinner(19, 19);


