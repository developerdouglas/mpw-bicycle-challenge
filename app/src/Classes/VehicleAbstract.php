<?php

namespace App\Classes;

abstract class VehicleAbstract implements VehicleInterface
{
    protected const RUN_ACTION = 'moving';
    protected const STATUS_TYPE_SUCCESS = 'success';
    protected const STATUS_TYPE_ERROR = 'error';

    protected ?VehicleOwner $owner = null;

    protected string $type = '';

    protected int $wheels = 0;

    protected bool $isLocked = false;

    protected bool $isRunning = false;

    protected string $statusMessage = '';

    protected string $statusType = '';

    public function getOwner(): VehicleOwner
    {
        return $this->owner;
    }

    public function setOwner(?VehicleOwner $owner): bool
    {
        if ($this->isLocked && $owner && $owner->getVehicle() !== $this) {
            return false;
        }

        // Unset previous owner if vehicle has an owner
        $this->owner?->setVehicle(null);

        $this->owner = $owner;
        return true;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    public function setIsLocked(bool $isLocked): void
    {
        $this->isLocked = $isLocked;
    }

    public function getRunAction(): string
    {
        return self::RUN_ACTION;
    }

    public function run(): void
    {
        if ($this->owner === null) {
            $this->statusMessage = 'A vehicle can\'t run without an owner';
            $this->statusType = self::STATUS_TYPE_ERROR;
            return;
        }

        if ($this->isLocked) {
            $this->statusMessage = 'A locked vehicle can\'t be run';
            $this->statusType = self::STATUS_TYPE_ERROR;
            return;
        }

        $this->isRunning = true;
        $this->statusType = self::STATUS_TYPE_SUCCESS;
        $this->statusMessage = "{$this->getOwner()->getName()} is {$this->isRunningString()} their {$this->getType()}!";
    }

    public function getVehicleStatus(): array
    {
        return ['status' => $this->statusType, 'message' => $this->statusMessage];
    }

    protected function isLockedString(): string
    {
        return $this->isLocked ? 'is locked' : 'is not locked';
    }
}