<?php

require_once 'NMEA.php';

/**
 * Class TXT
 *
 * $GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47
 */
class TXT extends NMEA
{
    const DESCRIPTION = 'Text';
    private $text;

    public function unpack($sentence)
    {
        $fields = NMEA::getFields($sentence);

        $this->text = $fields[4];
    }

    public function getText()
    {
        return $this->text;
    }

}