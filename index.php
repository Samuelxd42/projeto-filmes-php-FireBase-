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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <title>Site Web</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-5 bg-white rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <strong class="txt-margin"> Recomenda Filmes</strong> 
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link"> <img src="img/logout.svg" alt="" class="img-logout"> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</html>