## Bicycle Challenge - MPW

### Using a PHP framework, create a Bicycle Class and instantiate it. It needs some working parts of a bicycle and should be able to be run.

They will be evaluating these code properties:
- Code cleanliness
- Error handling
- OOP paradigms

This Challenge consists of a `VehicleAbstract` class and `Bicycle`, `Tricycle`, and `Car` classes that derive from it.

Vehicles can be run, but they will fail to run if they're locked or don't have an owner, so a `VehicleOwner` must exist with the vehicle assigned to it.

### Steps to run the project

- In your terminal, navigate to the project directory
- Run `docker-compose up -d --build`
- After Docker container is fully up, go to http://localhost:8080 in your browser

Relevant Classes are in /app/src/Classes.  
Classes are instantiated in /app/src/Controller/MainController.php
