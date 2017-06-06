<?php

namespace Omega;

class GPIO
{
    const IN = 'in';
    const OUT = 'out';
    private $pinNumber;
    private $direction;
    private $baseDir = '/sys/class/gpio';

    public function __construct(int $pinNumber, string $direction)
    {
        $this->assertValidDirection($direction);

        $this->pinNumber = $pinNumber;
        $this->direction = $direction;

        $this->enableGPIOPin();
        $this->setDirection();

        $this->valueHandler = fopen($this->getValueDirectory(), $direction === self::OUT ? 'w' : 'r');
    }

    protected function sysClassExits(): bool
    {
        return file_exists($this->getValueDirectory());
    }

    protected function getValueDirectory(): string
    {
        return $this->baseDir.'/gpio'.$this->pinNumber.'/value';
    }

    protected function getDirectionDirectory(): string
    {
        return $this->baseDir.'/gpio'.$this->pinNumber.'/direction';
    }

    protected function assertDirectionIsOut()
    {
        if ($this->direction !== self::OUT) {
            throw new \BadMethodCallException('The direction is IN, you cannot write!');
        }
    }

    protected function assertDirectionIsIn()
    {
        if ($this->direction !== self::OUT) {
            throw new \BadMethodCallException('The direction is OUT, you cannot read!');
        }
    }

    protected function setDirection()
    {
        $directionHandler = fopen($this->getDirectionDirectory(), 'rb+');
        if ($directionHandler === false) {
            throw new \Exception("Cannot open gpio direction file");
        }
        if (fwrite($directionHandler, $this->direction) !== strlen($this->direction)) {
            throw new \Exception("Cannot write to gpio direction file");
        }
        fclose($directionHandler);
    }

    protected function enableGPIOPin()
    {
        if ($this->sysClassExits()) {
            return;
        }

        $exportHandler = fopen($this->baseDir.'/export', 'wb');
        if ($exportHandler === false) {
            throw new \Exception("Cannot open gpio export file");
        }
        fwrite($exportHandler, $this->pinNumber);
        fclose($exportHandler);

        if (!$this->sysClassExits()) {
            throw new \Exception("Cannot write to gpio export file");
        }
    }

    /**
     * @param string $direction
     */
    protected function assertValidDirection(string $direction)
    {
        if (!in_array($direction, [self::IN, self::OUT], true)) {
            throw new \InvalidArgumentException("Direction must be 'in' or 'out'");
        }
    }

    public function setOn(): bool
    {
        $this->assertDirectionIsOut();

        return fwrite($this->valueHandler, '1') === 1;
    }

    public function setOff(): bool
    {
        $this->assertDirectionIsOut();

        return fwrite($this->valueHandler, '0') === 1;
    }

    public function getValue(): bool
    {
        $this->assertDirectionIsIn();

        return fread($this->valueHandler, 999);
    }
}
