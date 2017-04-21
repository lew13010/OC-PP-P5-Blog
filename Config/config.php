<?php
/*-----------  SITE GENERAL  -----------*/

$url_site       =   'http://blog.loc';
$time_session   =   900;

/*-----------  PAGINATION  -----------*/

$articleParPage    =   3;

/*-----------  DATABASE  -----------*/

$host   =   'localhost';
$dbname =   'oc_p5';
$port   =   '3306';
$login  =   'root';
$pass   =   '';


/*-----------  CONTACT  -----------*/

$adresse_email  =   'trancon.loic@gmail.com';
$objet_email    =   'contact';


/*-----------  CONSTANT  -----------*/

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