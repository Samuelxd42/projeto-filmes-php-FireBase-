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

    <h2> <strong>Indicações de Filmes Renomados</strong> </h2>

    <?php foreach ($filmes->getValue() as $filme) : ?>
        <div class="container">
            <div class="row">

                <img class="col-4 des-img" src="<?php echo $filme['imagemFilme'] ?>" height="380" width="80">

                <div class="col-8" class="des-filme">
                    <h3> <strong><?php echo $filme['nomeFilme'] ?></strong> </h3>
                    <h4> <?php echo $filme['descricaoFilme'] ?></h4>
                </div>
            </div>

        </div>
    <?php endforeach; ?>



</body>

</html>