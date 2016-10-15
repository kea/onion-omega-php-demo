<?php

include(__DIR__.'/../Omega/GPSExp.php');
include(__DIR__.'/../Omega/NMEA/GGA.php');
include(__DIR__.'/../Omega/NMEA/GLL.php');
include(__DIR__.'/../Omega/NMEA/TXT.php');

\onionSetVerbosity(ONION_VERBOSITY_NONE - 1);

$gps = new \Omega\GPSExp();

if (!$gps->checkInit()) {
    echo "No relay expansion found!\n";
    exit(1);
}

while ($gps->getPosition()) {
    sleep(1);
}