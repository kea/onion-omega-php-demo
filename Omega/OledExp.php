<?php

namespace Omega;

class OledExp
{
    private $initialized = false;

    public function __construct($initialize = true)
    {
        if ($initialize && $this->checkInit()) {
            $this->driverInit();
        }
    }

    public function checkInit()
    {
        return \oledCheckInit();
    }

    public function isInitialized()
    {
        return $this->initialized;
    }

    public function driverInit()
    {
        return $this->initialized = \oledDriverInit();
    }

    public function clear()
    {
        return \oledClear();
    }

    public function writeChar($c)
    {
        return \oledWriteChar($c);
    }

    public function setDisplayPower(bool $powerOn)
    {
        return \oledSetDisplayPower($powerOn);
    }

    public function setBrightness(bool $bright)
    {
        return \oledSetBrightness($bright);
    }

    public function write($message)
    {
        if (!$this->isInitialized()) {
            $this->driverInit();
        }

        return \oledWrite($message);
    }
}
