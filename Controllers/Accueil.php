<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 26/02/2017
 * Time: 14:25
 */

namespace Controllers;

class Accueil extends Controller
{
    public function indexAction()
    {
        return $this->twig->render('accueil/accueil.twig');
    }
}
