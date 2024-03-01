<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>

<header>
<?php include('header.php'); ?>
</header>

<main>

<?php include('oeuvres.php'); ?>

<?php 

function redirect($location='http://localhost/The%20Artbox/') {
    header("Location: $location");
    exit;
}

if (isset ($_GET['id'])) {
    $positionId = $_GET['id'];
} else {
    redirect();
}

$positionId = array_search($_GET['id'], array_column($oeuvres, 'id'));

if (false === $positionId) {
    redirect();
}

$oeuvre = $oeuvres[$positionId];
?>

        <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <img src="img/<?php echo $oeuvre['image'] ?>" alt="<?php echo $oeuvre['titre'] ?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?php echo $oeuvre['titre'] ?></h1>
                <p class="description"><?php echo $oeuvre['auteur'] ?></p>
                <p class="description-complete"><?php echo $oeuvre['description'] ?></p>
            </div>
        </article>

</main>

<footer>
<?php include('footer.php'); ?>
</footer>

</body>
</html>

