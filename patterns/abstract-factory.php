<?php

abstract class Car
{
    protected $model;
    protected $make;
    protected $year;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param mixed $make
     */
    public function setMake($make)
    {
        $this->make = $make;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
}

class FordCar extends Car
{
    public function __construct()
    {
        $this->setMake('Ford');
    }

    public function setMake($make)
    {
        throw new \LogicException('This can only be a Ford car.');
    }
}

class HondaCar extends Car
{
    public function __construct()
    {
        $this->setMake('Honda');
    }

    public function setMake($make)
    {
        throw new \LogicException('This can only be a Honda car.');
    }
}

abstract class CarAbstractFactoryPattern
{
    public static function make($carMake, $carModel)
    {
        $carMakeClass = "{$carMake}Car";
        if (class_exists($carMakeClass)) {
            /** @var Car $car */
            $car = new $carMakeClass();

            if (!($car instanceof Car)) {
                throw new RuntimeException('It is not of the correct type of Car.');
            }
            $car->setModel($carModel);

            return $car;
        }

        throw new RuntimeException("{$carMake} does not exist.");
    }
}



//interface Shape {
//    public function draw();
//}
//
//class Triangle implements Shape {
//    public function draw()
//    {
//        echo "Drawing Triangle.";
//    }
//}
//
//class Rectangle implements Shape {
//    public function draw()
//    {
//        echo "Drawing R.";
//    }
//}
//class FactoryPattern
//{
//
//}