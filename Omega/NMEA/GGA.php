<?php

require_once 'NMEA.php';

/**
 * Class GGA
 *
 * $GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47
 */
class GGA extends NMEA
{
    const DESCRIPTION = 'Global Positioning System Fix Data';
    private $UTC;
    private $latitude;
    private $N_S;
    private $longitude;
    private $E_W;
    private $quality;
    private $satsInView;
    private $HDOP;
    private $antennaAlt;
    private $antennaAltMetres;
    private $geoidSeparation;
    private $geoidSeparationMetres;
    private $age;
    private $refStationId;

    public function unpack($sentence)
    {
        $fields = NMEA::getFields($sentence);

        $this->UTC = $fields[1];
        $this->latitude = $fields[2];
        $this->N_S = $fields[3];
        $this->longitude = $fields[4];
        $this->E_W = $fields[5];
        $this->quality = $fields[6];
        $this->satsInView = $fields[7];
        $this->HDOP = $fields[8];
        $this->antennaAlt = $fields[9];
        $this->antennaAltMetres = $fields[10];
        $this->geoidSeparation = $fields[11];
        $this->geoidSeparationMetres = $fields[12];
        $this->age = $fields[13];
        $this->refStationId = $fields[14];
//        $this->status = $fields['status'];
    }

}