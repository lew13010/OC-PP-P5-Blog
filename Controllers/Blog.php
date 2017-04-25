<?php

namespace Controllers;

use \PDO;
use Models\BlogRepository;
use Services\Form;

class Blog extends Controller
{
    private $id;
    private $token;
    private $bdd;

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
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function setBdd(PDO $bdd)
    {
        $this->bdd = $bdd;
        return $this;
    }

    public function listAction()
    {
        $page = $this->id;

        $repo = new BlogRepository($this->bdd);
        $pagination = $repo->pagination($page);

        $limit = $pagination['limit'];
        $totalPage = $pagination['totalPage'];

        $articles = $repo->viewAllArticles($limit);

        return $this->twig->render('blog/list.twig', array(
            "articles" => $articles,
            "paginations" => $totalPage,
            "page" => $page
        ));
    }

    public function addAction()
    {
        $valid = '';
        $services = new Form();
        if ($services->formIsValid()) {
            $repo = new BlogRepository($this->bdd);
            if($repo->addArticle($this->bdd)){
                $valid = 'succes';
            }
            else{
                $valid = 'fault';
            }
        }

        return $this->twig->render('blog/add.twig', array(
            "token" => $this->token,
            "valid" => $valid,
        ));
    }

    public function editAction()
    {
        $valid = '';
        $services = new Form();
        $repo = new BlogRepository($this->bdd);
        if ($services->formIsValid()) {
            if($repo->editArticle($this->id)){
                $valid = 'succes';
            }
            else{
                $valid = 'fault';
            }
        }

        $article = $repo->getArticle($this->id);

        return $this->twig->render('blog/edit.twig', array(
            "token" => $this->token,
            "article" => $article,
            "valid" => $valid,
        ));
    }

    public function viewAction()
    {
        $repo = new BlogRepository($this->bdd);
        $article = $repo->getArticle($this->id);

        return $this->twig->render('blog/view.twig', array(
            "article" => $article,
            "token" => $this->token,
        ));
    }

    public function deleteAction()
    {
        $repo = new BlogRepository($this->bdd);
        $repo->deleteArticle($this->id);

        header('Location: /blog');
        return;
    }
}
