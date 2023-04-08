<?php 
namespace library;
use \Valitron\Validator as v;
use \library\message;

class error
{
    public static function fail($v, $http = false, $time = 1)
    {
        $return = message::getInstance();
        
        if(!$v->validate())
        {
            $return->code(404)->time($time)->http($http);
        }
    }
    
    public static function valitron($v, $http = false, $time = 1)
    {
        $return = message::getInstance();

        if(!$v->validate())
        {
            foreach($v->errors() as $error)
            {
                foreach($error as $item)
                {
                    $return->code(404)->response($item)->time($time)->get()->http($http);
                }
            }
        }
    }

    public static function jsonvalitron($v)
    {
        $return = message::getInstance();
        
        if(!$v->validate())
        {
            foreach($v->errors() as $error)
            {
                foreach($error as $item)
                {
                    $return->code(300)->response($item)->json();
                }
            }
        }
    }
}