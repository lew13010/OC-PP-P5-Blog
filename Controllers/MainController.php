<?php

namespace Controllers;

class MainController extends Controller
{
    private $page;
    private $action;

    public function __construct(array $donnees)
    {
        parent::__construct();
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**** SETTERS ****/
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function setAction($action)
    {
        $this->action = $action . "Action";
        return $this;
    }

    public function main(array $donnees)
    {
        $ucPage = ucfirst($this->page);
        $namespace = "\\Controllers\\$ucPage";
        $action = $this->action;

        if (class_exists($namespace)) {
            $models = new $namespace($donnees);

            if (method_exists($models, $this->action)) {
                return $models->$action();
            }
        }
        return $this->twig->render('error/404.twig');
    }
}
