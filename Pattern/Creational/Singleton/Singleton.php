<?php 

namespace Pattern\Creational\Singleton;

class Singleton
{
    private static $instance = [];

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        $class = static::class;
        if(!isset(self::$instance[$class]))
        {
            self::$instance[$class] = new static();
        }
        return self::$instance[$class];
    }
}


?>