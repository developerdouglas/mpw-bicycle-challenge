<?php

namespace App\Classes;

class Car extends VehicleAbstract
{
    protected const RUN_ACTION = 'driving';

    public function __construct(bool $isLocked = false)
    {
        $this->type = 'car';
        $this->wheels = 4;
        $this->isLocked = $isLocked;
    }

    public function isRunningString(): string
    {
        return sprintf('%s%s', !$this->isRunning ? 'not ' : '', self::RUN_ACTION);
    }
}