<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 06/03/2017
 * Time: 12:04
 */

namespace Controllers;

use Twig_Loader_Filesystem;
use Twig_Environment;

class Twig
{
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance))
        {
            require_once '../vendor/autoload.php';

            $loader = new Twig_Loader_Filesystem('../Views');
            self::$_instance = new Twig_Environment($loader, array(
                //'cache' => 'Cache',
                'cache' => false,
                'debug' => false,
            ));
        }
        return self::$_instance;
    }
}