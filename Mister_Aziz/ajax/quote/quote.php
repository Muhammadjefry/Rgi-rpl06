<?php

$quotes = array(
    array(
        'I\'m sick of following my dreams, man. I\'m just going to ask where they\'re going and hook up with \'em later.',
        'Mitch Hedberg',
    ),
    array(
        'Before you criticize someone, you should walk a mile in their shoes. That way when you criticize them, you are a mile away from them and you have their shoes.',
        'Jack Handey',
    ),
    array(
        'When your mother asks, \'Do you want a piece of advice?\' it is a mere formality. It doesn\'t matter if you answer yes or no. You\'re going to get it anyway.',
        'Erma Bombeck',
    ),
    array(
        'I want my children to have all the things I couldn\'t afford. Then I want to move in with them.',
        'Phyllis Diller',
    ),
);


$pick_one = array_rand($quotes); 
// echo $quotes[$pick_one][0];
// echo $quotes[$pick_one][1];
$output = array(
    'status' => $pick_one ,
    'pesan' => $quotes[$pick_one][0],
    'quoter' => $quotes[$pick_one][1],
);
$output = json_encode($output);
echo $output;




?>