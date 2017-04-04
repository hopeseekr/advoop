<?php

class MultitonPattern
{
    /** @var MultitonPattern[] **/
    private static $objects = [];

    private function __construct()
    {
    }

    public static function getInstance($option)
    {
        $selector = $option;
        if ($option === 'blah') {
            self::$objects['blah'] = new MultitonPattern();
        } else {
            self::$objects[$selector] = new MultitonPattern();
        }

        return self::$objects[$selector];
    }
}
