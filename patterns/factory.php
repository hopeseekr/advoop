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

abstract class CarFactoryPattern
{
    public static function make($carMake, $carModel)
    {
        switch ($carMake) {
            case "Ford":
                $car = new FordCar();
                break;
            case "Honda":
                $car = new HondaCar();
                break;
            default:
                throw new RuntimeException("{$carMake} does not exist.");
        }

        $car->setModel($carModel);

        return $car;
    }
}

