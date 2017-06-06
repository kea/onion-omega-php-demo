<?php

include __DIR__.'/../Omega/GPIO.php';

$pins = [0,1,18,19,5,4,2,3];

echo "Initialize GPIO ";
foreach ($pins as $pin) {
    echo $pin." ";
    try {
        $g[$pin] = new \Omega\GPIO($pin, 'out');
    } catch (Exception $e) {
        echo "KO {$e->getMessage()}\n";
    }
}

echo "\nSet On: ";
foreach ($pins as $pin) {
    echo "\nPin: ".$pin." ";
    echo $g[$pin]->setOn() ? 'Ok' : 'Ko';
    sleep(1);
    $g[$pin]->setOff();
}

$pins2 = array_merge($pins, array_reverse($pins));
unset($pins2[8]);
foreach ($pins2 as $pin) {
    $g[$pin]->setOn();
    usleep(100000);
    $g[$pin]->setOff();
}

foreach ($pins as $pin) {
    $g[$pin]->setOn();
}
sleep(2);
foreach ($pins as $pin) {
    $g[$pin]->setOff();
}

//unset($g);
//$g = new \Omega\GPIO(0, 'out');
//var_dump($g->getValue());
