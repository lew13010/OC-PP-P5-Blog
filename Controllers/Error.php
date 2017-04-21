<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 26/02/2017
 * Time: 18:46
 */

namespace Controllers;

class Error extends Controller
{
    public function indexAction()
    {
        return $this->twig->render('error/404.twig');
    }
}
