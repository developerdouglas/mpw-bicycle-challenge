<?php

namespace App\Controller;

use App\Classes\Bicycle;
use App\Classes\Car;
use App\Classes\Tricycle;
use App\Classes\VehicleOwner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{

    public function index(): Response
    {
        $output = [];

        $car = new Car();
        $bike = new Bicycle();
        $trike = new Tricycle();

        $amanda = new VehicleOwner('Amanda');
        $jerry = new VehicleOwner('Jerry');
        $tommy = new VehicleOwner('Tommy');

        // Here's a car. Can it run?
        $output[] = $this->outputInfo('Here\'s a bicycle. Can it run?');
        $bike->run();
        $output[] = $bike->getVehicleStatus();

        $output[] = $this->outputInfo('Oh no! Assign a vehicle to an owner so it can run.');
        $amanda->setVehicle($bike);
        // Now can it run?
        $amanda->getVehicle()?->run();
        $output[] = $amanda->getVehicle()?->getVehicleStatus();

        // Amanda should lock up the car
        $output[] = $this->outputInfo('Amanda locks up their bike so it doesn\'t walk off.');
        $amanda->getVehicle()?->setIsLocked(true);

        // Jerry Owns the Car
        $jerry->setVehicle($car);
        $jerry->getVehicle()?->run();
        $output[] = $jerry->getVehicle()?->getVehicleStatus();

        // Tommy Owns the Bicycle
        $tommy->setVehicle($trike);
        $tommy->getVehicle()?->run();
        $output[] = $tommy->getVehicle()?->getVehicleStatus();

        // Amanda should lock up the car
        $output[] = $this->outputInfo('Tommy attempts to lock up their tricycle.');
        $tommy->getVehicle()?->setIsLocked(true);
        $output[] = $tommy->getVehicle()?->getVehicleStatus();

        // Billy, what are you doing?
        $output[] = $this->outputInfo('Billy is up to no good!');
        $billy = new VehicleOwner('Billy', $bike);
        $billy->getVehicle()?->run();
        $output[] = $billy->getVehicle()?->getVehicleStatus();
        $billy->getVehicle()?->setOwner($billy);
        $billy->getVehicle()?->setIsLocked(false);
        $billy->getVehicle()?->run();
        $output[] = $billy->getVehicle()?->getVehicleStatus();

        $twigData = [
            'output' => $output
        ];

        return $this->render('main/index.html.twig', $twigData);
    }

    private function outputInfo(string $message): array
    {
        return ['message' => $message];
    }
}