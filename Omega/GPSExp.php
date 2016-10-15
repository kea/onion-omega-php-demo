<?php

namespace Omega;

class GPSExp
{
    const FILE_DESCRIPTOR = '/dev/ttyACM0';
    private $fileHandler;

    public function checkInit()
    {
        return file_exists(self::FILE_DESCRIPTOR) && is_readable(self::FILE_DESCRIPTOR);
    }

    public function getPosition()
    {
        if (!$this->fileHandler) {
            $this->fileHandler = fopen(self::FILE_DESCRIPTOR, 'r');
        }

        $sentence = fgets($this->fileHandler);
        if (trim($sentence) == '') {
            $sentence = fgets($this->fileHandler);
        }
        switch (substr($sentence, 0, 6)) {
            case '$GPGGA':
                echo "GGA: ";
                $gga = new \GGA($sentence);
                print_r($gga);
                break;
            case '$GPGLL':
                echo "GLL: ";
                $gll = new \GLL($sentence);
                print_r($gll);
                break;
            case '$GPTXT':
                echo "TXT: ";
                $txt = new \TXT($sentence);
                echo $txt->getText()."\n";
                break;
            case '$GPRMC':
            case '$GPGSA':
            case '$GPGSV':
            case '$GPVTG':
                echo substr($sentence, 0, 6);
                echo " Not yet supported\n";
                break;
            default:
                echo "Not supported\n";
        }

        return true;
    }
}