<?php

/**
 * Class NMEA
 */
abstract class NMEA
{
    const DESCRIPTION = '';
    protected $checksum = null;
    protected $status = 'V';

    /**
     * NMEA constructor.
     */
    public function __construct($sentence = null)
    {
        if ($sentence !== null) {
            $this->unpack($sentence);
        }
    }

    abstract public function unpack($sentence);

    /**
     * @param $sentence
     * @return array
     * @throws Exception
     */
    public static function getFields($sentence)
    {
        $string = substr($sentence, 1);
        list($fields, $checksum) = explode('*', $string);
        $CRC = self::generateCRC($fields);

        if (trim($checksum) !== $CRC) {
            throw new \Exception("Invalid CRC '".$sentence."' => '".$CRC."'");
        }

        return explode(',', $fields);
    }

    /**
     * @param $message
     * @return string
     */
    protected static function generateCRC($message)
    {
        $crc = 0;
        for ($i = 0; $i < strlen($message); $i++) {
            $crc = $crc ^ ord($message[$i]);
        }

        return strtoupper(dechex($crc));
    }
}
