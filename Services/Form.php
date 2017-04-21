<?php
/**
 * Created by PhpStorm.
 * User: Lew
 * Date: 26/02/2017
 * Time: 17:31
 */

namespace Services;


class Form
{
    public function formIsValid()
    {
        if( isset($_POST['titre'])   &&  !empty($_POST['titre'])    && (strlen($_POST['titre']) <= 20) &&
            isset($_POST['auteur'])  &&  !empty($_POST['auteur'])   &&
            isset($_POST['message']) &&  !empty($_POST['message'])  &&
            isset($_POST['chapo'])   &&  (strlen($_POST['chapo']) <= 100)  &&
            isset($_POST['token'])   &&  !empty($_POST['token'])    &&
            $_POST['token'] === $_SESSION['token']                  &&
            $_SESSION['token_time'] <= time()+TIME_SESSION)
        {
            return true;
        }
        return false;
    }

    public function mailIsValid()
    {
        if (isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) &&
            isset($_POST['tel']) && !empty($_POST['tel']) &&
            isset($_POST['message']) && !empty($_POST['message']) &&
            isset($_POST['token']) && !empty($_POST['token']) &&
            $_POST['token'] === $_SESSION['token'] &&
            $_SESSION['token_time'] <= time() + TIME_SESSION
        ) {
            return true;
        }
        return false;
    }

    public function sessionIsValid()
    {
        if(isset($_POST['token'])   &&  !empty($_POST['token'])    &&
            $_POST['token'] === $_SESSION['token']                  &&
            $_SESSION['token_time'] <= time()+TIME_SESSION)
        {
            return true;
        }
        return false;
    }

    public function secure($string)
    {
        return htmlspecialchars(str_replace(array("\n","\r",PHP_EOL),'',$string));
    }
}
