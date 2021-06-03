<?php

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
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Site Web</title>
</head>

<body>

    <?php foreach ($filmes->getValue() as $filme) : ?>

        <section id="filmes-id">
            <div class="row">

                <div class="col-md-4 imagem-filme">
                    <img src="<?php echo $filme['imagemFilme'] ?>" height="320" width="200">
                </div>

                <div class="col-md-8 descricoes-filme">
                    <h3 class="nome-filme"><?php echo $filme['nomeFilme'] ?></h3>
                    <h4 class="des-filme"> <?php echo $filme['descricaoFilme'] ?></h4>
                </div>

            </div>
        </section>

    <?php endforeach; ?>

</body>

</html>