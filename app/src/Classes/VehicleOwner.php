<?php

namespace App\Classes;

class VehicleOwner
{
    private string $name;

    private ?VehicleInterface $vehicle;

    public function __construct($name, $vehicle = null)
    {
        $this->name = $name;
        $this->vehicle = $vehicle;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getVehicle(): ?VehicleInterface
    {
        return $this->vehicle;
    }

    public function setVehicle(?VehicleInterface $vehicle): void
    {
        $this->vehicle = $vehicle;

        if ($vehicle !== null) {
            $this->vehicle->setOwner($this);
        }
    }

    public function stealVehicle(VehicleInterface $vehicle): bool
    {
        $this->vehicle = $vehicle;
        return $vehicle->setOwner($this);
    }
}