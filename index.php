<?php

if (!$_COOKIE["loginToken"]) {
    header("Location: login.php");
    exit;
}


require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://projeto-web-f5af1-default-rtdb.firebaseio.com/filmes');

$database = $factory->createDatabase();

$filmes = $database->getReference('filmes')->getSnapshot();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-index.css">

    <title>Site Web</title>
</head>

<body>

    <header id="header">
        <a id="logo" href="index.php">Recomenda Filmes</a>
        <nav id="nav">
            <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="/">Drama</a></li>
                <li><a href="/">Comédia</a></li>
                <li><a href="/">Ação</a></li>
                <li><a href="/">Terror</a></li>
                <a href="login.php"><img src="img/logout.svg" alt="" class="img-logout"></a>
            </ul>
        </nav>
    </header>

    <?php foreach ($filmes->getValue() as $filme) : ?>
        <div class="container">
            <div class="row">

                <img class="col col-lg-3 des-img" class="img-fluid" src="<?php echo $filme['imagemFilme'] ?>" height="350">

                <div class="col col-lg-9" class="des-filme">
                    <h3> <strong><?php echo $filme['nomeFilme'] ?></strong> </h3>
                    <h4> <?php echo $filme['descricaoFilme'] ?></h4>
                </div>

            </div>

        </div>
    <?php endforeach; ?>

</body>

<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</html>