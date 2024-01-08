<?php

namespace App\Classes;

class Bicycle extends VehicleAbstract
{
    protected const RUN_ACTION = 'riding';

    public function __construct(bool $isLocked = false)
    {
        $this->type = 'bicycle';
        $this->wheels = 2;
        $this->isLocked = $isLocked;
    }

    public function isRunningString(): string
    {
        return sprintf('%s%s', !$this->isRunning ? 'not ' : '', self::RUN_ACTION);
    }
}