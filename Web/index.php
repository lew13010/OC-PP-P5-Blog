<?php
/*-----------  SESSION  -----------*/
session_start();

if(!isset($_POST['submit'])) // Test si Soumission Formulaire
{
    // Generation d'un token
    $token = uniqid(rand(), true);
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();
}
else{
    // Reccupération du token soumis par le formulaire
    $token = $_POST['token'];
}

/*-----------  CONFIG LOADER  -----------*/
require_once '../Config/config.php';


/*-----------  SECURE URL  -----------*/
if(isset($_GET['page'])){
    $page = htmlspecialchars($_GET['page']);
}else
{
    $page = 'accueil';
}

if(isset($_GET['action'])){
    $action = htmlspecialchars($_GET['action']);
}else
{
    $action = 'index';
}

if(isset($_GET['id'])){ // Peut être soit une id soit un numero de page
    $id = htmlspecialchars($_GET['id']);
}else
{
    $id = null;
}

/*-----------  AUTOLOADER  -----------*/
spl_autoload_register( function ($className) {
    $subNamespace = explode('\\', $className);
    $count = (count($subNamespace) - 1);
    $file = end($subNamespace);
    $namespace = '';
    for ($i = 0; $i < $count; $i++) {
        $namespace .= $subNamespace[$i] . DIRECTORY_SEPARATOR;
    }
    $class = '..' . DIRECTORY_SEPARATOR . $namespace . $file . '.php';

    if (file_exists($class)) {
        include_once $class;
    }
});

/*-----------  CHARGEMENT PAGE  -----------*/
$donnees = array(
    'page'      => $page,
    'action'    => $action,
    'id'        => $id,
    'token'     => $token,
    'bdd'       => $bdd,
);

$url = new Controllers\MainController($donnees);
echo $url->main($donnees);
