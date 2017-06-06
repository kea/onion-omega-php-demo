<?php

class ServoMotor
{
    const SERVO_MIN_PULSE = 1000;
    const SERVO_MAX_PULSE = 2000;

    public function __construct($channel, $minPulse = self::SERVO_MIN_PULSE, $maxPulse = self::SERVO_MAX_PULSE)
    {
        $this->channel = $channel;
        $this->frequency = 50;
        $this->pwmDriver = new \Omega\PwmExp();
        $this->pwmDriver->setFrequency($this->frequency);
        $this->minPulse = $minPulse;
        $this->maxPulse = $maxPulse;
        $this->range = $this->maxPulse - $this->minPulse;
        $this->step = $this->range / 180.0;
        $this->period = (1000000 / $this->pwmDriver->getFrequency());
        $this->minAngle = 0;
        $this->maxAngle = 180;
    }

    public function setAngle($angle)
    {
        if ($angle < $this->minAngle) {
            $angle = $this->minAngle;
        } elseif ($angle > $this->maxAngle) {
            $angle = $this->maxAngle;
        }

        $pulseWidth = $angle * $this->step + $this->minPulse;
        $duty = ($pulseWidth * 100.0) / $this->period;

        return $this->pwmDriver->setupDriver($this->channel, $duty, 0);
    }
}