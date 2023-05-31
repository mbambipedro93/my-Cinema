<?php
if (isset($_GET['forms2']) and !empty($_GET['forms2'])) {
    $nom = $db->query('SELECT firstname,lastname, from user"' . $_GET['firstname'] . '%" ');
    $titre = $nom->fetchAll();
}

?>
<html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>CineRoom</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">

                    <h4>CineRoom</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="Cinema.php">Film</a>
                        </li>
                        <li class="nav-item">
                            <a href="utilisateur.php">Utilisateur</a>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="forms">
            <form name="forms2" method="GET" action="">
                <div class="forms1">
                    <input type="serch" name="nom" placeholder="nom" autocomplete="off">
                    <input type="serch" name="prenom" placeholder="Prénom" autocomplete="off">
                    <input type="submit" name="valider" value="rechercher" />
                </div>


    </header>
    <main>
        <hr>
        <div class="nom_prenom">
            <p><strong>Résultats des recherche</strong></p>
            <?php
            if ($nom->rowCount() > 0) {
                foreach ($titre as $M) {

                    ?>
                    <p>
                        <?php echo $M['firstname']; ?>
                    </p>
                    <p>
                        <?php echo $M['lastname']; ?>
                    </p>
                    <?php
                }
            } else {
                ?>
                <p>YA R POTO .</p>
                <?php
            }
            ?>
    </main>
    <footer>
        <img src="a.jpg" alt="hectoplasma pokemon" width="100px">

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" </body>
</html >