<?php

include(__DIR__.'/../Omega/OledExp.php');

$message = sprintf("Hello PHP %s world!\n", phpversion());
$message.= sprintf("Omega PHP extension v%s", phpversion('omega'));

$oled = new \Omega\OledExp();

if (!$oled->clear()) {
    echo "Error: display clear failed!\n";
}

if (!$oled->write($message)) {
    echo "Error: display write failed!\n";
}
