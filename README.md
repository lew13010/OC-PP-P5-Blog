# p5_Blog
Projet OpenClassroom - Créez votre premier blog en PHP

## Required
 * PHP >=5.6.25
 * Twig ~1.0
 
## Installation

 * Twig with composer :
 
 ```
 $ composer install
 ```

 * Config :
 
 Rename in folder "/Config" the file *config-default.php* in *config.php* and put your values :
 ```
 $url_site       =   'http://exemple.com';   // URL du site doit pointer OBLIGATOIREMENT vers /Web
 $time_session   =   900;                    // Durée de session en sec (par default 15min : $time_session = 900;)
 ```
 
 ```
 $articleParPage    =   9;   // Preference pour un multiple de 3 ex: 3, 6, 9, 12…
 ```
 
 ```
 $host   =   'host';     // URL du serveur de la BDD
 $dbname =   'dbname';   // Nom de la BDD
 $port   =   '3306';     // Port du serveur de la BDD (par default : $port = '3306';)
 $login  =   'root';     // Login de connexion à la BDD
 $pass   =   'password'; // Mot de passe de connexion à la BDD
 ```

 ```
 $adresse_email  =   'adresse@mail.com'; // Votre adresse email de contact
 $objet_email    =   'objet';            // Objet du mail par default
 ```
 