
<?php

include('login.php');

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://projeto-web-f5af1-default-rtdb.firebaseio.com/filmes');

$database = $factory->createDatabase();

$login = $database->getReference('login')->getSnapshot();


if (isset($_POST['login_firebase'])) {

    $loginSucess = $login->getValue()[0];

    $email = $_POST['user'];
    $password = $_POST['password'];

    if ($email === $loginSucess['user']) {

        if (md5($password) === $loginSucess['password']) {
            echo "Logun sucesso!";
            header("Location: index.php");
            exit;
        }
    } else {

        if (!function_exists("protect")) {
            function protect()
            {

                if (!isset($_SESSION)) {
                    session_start();

                    if (!isset($_SESSION['user'])) {
                        header("Location: login.php");
                    }
                }
            }
        }
    }
}



?>
