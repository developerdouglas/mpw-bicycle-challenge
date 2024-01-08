<?php

namespace App\Classes;

interface VehicleInterface
{
    public function getOwner(): VehicleOwner;

    public function setOwner(?VehicleOwner $owner): bool;

    public function getType(): string;

    public function setType(string $type): void;

    public function isRunningString(): string;

    public function isLocked(): bool;

    public function setIsLocked(bool $isLocked): void;

    public function getRunAction(): string;

    public function run(): void;

    public function getVehicleStatus(): array;
}