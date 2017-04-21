<?php
/*-----------  GENERAL  -----------*/

$url_site       =   'http://exemple.com';   // URL du site doit pointer OBLIGATOIREMENT vers /Web
$time_session   =   900;                    // Durée de session en sec (par default 15min : $time_session = 900;)


/*-----------  PAGINATION  -----------*/

$articleParPage    =   9;   // Preference pour un multiple de 3 ex: 3, 6, 9, 12…


/*-----------  DATABASE  -----------*/

$host   =   'host';     // URL du serveur de la BDD
$dbname =   'dbname';   // Nom de la BDD
$port   =   '3306';     // Port du serveur de la BDD (par default : $port = '3306';)
$login  =   'root';     // Login de connexion à la BDD
$pass   =   'password'; // Mot de passe de connexion à la BDD


/*-----------  CONTACT  -----------*/

$adresse_email  =   'adresse@mail.com'; // Votre adresse email de contact
$objet_email    =   'objet';            // Objet du mail par default


/*-----------  DEFINE CONSTANT  -----------*/

define("URL"                , $url_site         , false);
define("TIME_SESSION"       , $time_session     , false);
define("ARTICLE_PAR_PAGE"   , $articleParPage   , false);
define("TO"                 , $adresse_email    , false);
define("SUBJECT"            , $objet_email      , false);
define("HOST"               , $host             , false);
define("DBNAME"             , $dbname           , false);
define("PORT"               , $port             , false);
define("LOGIN"              , $login            , false);
define("PASS"               , $pass             , false);

/*-----------  CONNEXION PDO  -----------*/

try
{
    $bdd = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DBNAME, LOGIN, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}