<?php

namespace App\Classes;

class Tricycle extends VehicleAbstract
{
    protected const RUN_ACTION = 'riding';

    public function __construct()
    {
        $this->wheels = 3;
        $this->type = 'tricycle';
    }

    public function isRunningString(): string
    {
        return sprintf('%s%s', !$this->isRunning ? 'not ' : '', self::RUN_ACTION);
    }

    public function setIsLocked(bool $isLocked): void
    {
        $this->statusMessage = 'Tricycles can\'t be locked up!';
        $this->statusType = self::STATUS_TYPE_ERROR;
    }
}