<?php

include(__DIR__.'/../Omega/RelayExp.php');

\onionSetVerbosity(ONION_VERBOSITY_NONE - 1);

$actives = \Omega\RelayExp::scan();

if (empty($actives)) {
    echo "No relay expansion found!\n";
    exit(1);
}

$relay = new \Omega\RelayExp(\Omega\RelayExp::addressToSwitch($actives[0]));

$relay->setAllChannels(1);
sleep(2);
$relay->setChannel(1, 0);
sleep(2);
$relay->setChannel(0, 0);
sleep(2);
$relay->setAllChannels(1);
sleep(2);
$relay->setAllChannels(0);