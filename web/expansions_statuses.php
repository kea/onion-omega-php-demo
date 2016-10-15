<?php

require_once __DIR__.'/../Omega/RelayExp.php';
require_once __DIR__.'/../Omega/OledExp.php';
require_once __DIR__.'/../Omega/PwmExp.php';
require_once __DIR__.'/../Omega/GPSExp.php';

header("Content-type: application/json");

$response = [];

\onionSetVerbosity(ONION_VERBOSITY_NONE - 1);

$actives = \Omega\RelayExp::scan();
$response['relay'] = empty($actives) ? false : \Omega\RelayExp::addressToSwitch($actives[0]);

$pwm = new \Omega\PwmExp(false);
$response['pwm'] = $pwm->checkInit();

$gps = new \Omega\GPSExp();
$response['gps'] = $gps->checkInit();

$oled = new \Omega\OledExp(false);
$response['oled'] = $oled->checkInit();

if ($response['oled']) {
    $oled->write('Hello world');
}

echo json_encode($response);

