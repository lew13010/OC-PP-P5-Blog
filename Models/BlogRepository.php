<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 26/02/2017
 * Time: 15:19
 */

namespace Models;

use \PDO;
use \DateTime;
use Services\Form;

class BlogRepository
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function viewAllArticles($limit)
    {
        $req = $this->bdd->prepare("SELECT * FROM blog ORDER BY date DESC LIMIT :entree, :sortie");
        $req->bindValue(':entree', $limit, PDO::PARAM_INT);
        $req->bindValue(':sortie', ARTICLE_PAR_PAGE, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArticle()
    {
        $form = new Form();
        $titre = $form->secure($_POST['titre']);
        $auteur = $form->secure($_POST['auteur']);
        $chapo = $form->secure($_POST['chapo']);
        $contenu = $form->secure($_POST['message']);
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $req = $this->bdd->prepare("INSERT INTO blog (titre,contenu,auteur,chapo, date) VALUES (:titre,:contenu,:auteur,:chapo, :date)");
        $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'auteur' => $auteur,
            'chapo' => $chapo,
            'date' => $date,
        ));
        return;
    }

    public function editArticle($id)
    {
        $form = new Form();
        $titre = $form->secure($_POST['titre']);
        $auteur = $form->secure($_POST['auteur']);
        $chapo = $form->secure($_POST['chapo']);
        $contenu = $form->secure($_POST['message']);
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');


        $req = $this->bdd->prepare("UPDATE blog SET titre = :titre, contenu = :contenu, auteur = :auteur, date = :date, chapo = :chapo WHERE id = :id");
        $req->execute(array(
            'id' => $id,
            'titre' => $titre,
            'contenu' => $contenu,
            'auteur' => $auteur,
            'date' => $date,
            'chapo' => $chapo,
        ));
        return;
    }

    public function deleteArticle($id)
    {
        $req = $this->bdd->prepare("DELETE FROM blog WHERE id = :id");
        $req->execute(array(
            'id' => $id,
            ));
        return true;
    }

    public function getArticle($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM blog WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function pagination($page)
    {
        $req = $this->bdd->query("SELECT COUNT(*) FROM blog");

        $count = $req->fetchColumn();
        $totalPage = ceil($count / ARTICLE_PAR_PAGE);

        if ($page > $totalPage || $page < 1) {
            $page = 1;
        }

        $limit = ($page - 1) * ARTICLE_PAR_PAGE;
        return array("limit" => $limit, "totalPage" => $totalPage);
    }
}
