<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 24/03/2017
 * Time: 10:03
 */

namespace Controllers;

use \Controllers\Twig;

abstract class Controller
{
    protected $twig;

    public function __construct()
    {
        $this->twig = Twig::getInstance();
    }
}