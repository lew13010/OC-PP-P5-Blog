<?php

namespace Controllers;

use Services\Form;
use \mail;

class Contact extends Controller
{
    private $token;

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

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function indexAction()
    {
        $services = new Form();
        if ($services->mailIsValid()) {
            $nom = htmlspecialchars($_POST['nom']);
            $mail = htmlspecialchars($_POST['mail']);
            $phone = htmlspecialchars($_POST['tel']);
            $message = htmlspecialchars($_POST['message']);

            $headers = "MIME-Version: 1.0 \r\n" .
                "Content-type: text/html; charset=UTF-8 \r\n" .
                "From: $mail \r\n";

            $text = "<html>
                        <body>
                            <p>Contact site</p>
                            <p>Nom : <b>$nom</b></p>
                            <p>Mail : <b>$mail</b></p>
                            <p>Téléphone : <b>$phone</b></p>
                            <p>Message : $message</p>
                        </body>
                    </html>
            ";
            mail(TO, SUBJECT, $text, $headers);
        }
        return $this->twig->render('contact/contact.twig', array(
            "token" => $this->token,
        ));
    }
}
