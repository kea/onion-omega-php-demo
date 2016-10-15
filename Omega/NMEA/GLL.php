<?php

require_once 'NMEA.php';

/**
 * Class GLL
 *
 * $GPGLL,4916.45,N,12311.12,W,225444,A,*1D
 */
class GLL extends NMEA
{
    const DESCRIPTION = 'Geographic position, Latitude and Longitude';
    private $latitude;
    private $N_S;
    private $longitude;
    private $E_W;
    private $age;

    public function unpack($sentence)
    {
        $fields = NMEA::getFields($sentence);

        $this->latitude = $fields[2];
        $this->N_S = $fields[3];
        $this->longitude = $fields[4];
        $this->E_W = $fields[5];
        $this->age = $fields[6];
        $this->status = $fields[7];
    }

}