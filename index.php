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

    <div class="container-nav">
        <div class="row">
            <h2 class="col-8"> <strong class="txt-margin"> Recomenda Filmes</strong> </h2>

            <a class="col-4" href="login.php"><img src="img/log-out.svg" alt="" class="img-logout"></a>
        </div>

    </div>

    <?php foreach ($filmes->getValue() as $filme) : ?>
        <div class="container">
            <div class="row">

                <img class="col-3 des-img" src="<?php echo $filme['imagemFilme'] ?>" height="350">

                <div class="col-9" class="des-filme">
                    <h3> <strong><?php echo $filme['nomeFilme'] ?></strong> </h3>
                    <h4> <?php echo $filme['descricaoFilme'] ?></h4>
                </div>
            </div>

        </div>
    <?php endforeach; ?>

</body>

</html>