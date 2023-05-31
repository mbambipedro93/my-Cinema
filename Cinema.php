<?php
require_once "conect.php";
//si formulaire on alors scripte start et si zone texte non vide 
$movie = $db->query("SELECT * FROM movie ORDER BY title");
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $movie = $db->query('SELECT title from movie WHERE title like "' . $_GET['s'] . '%" ');
    $titre = $movie->fetchAll();
}
//recherche distributor 
elseif (isset($_GET['1']) and !empty($_GET['1'])) {

    $movie = $db->query('SELECT distributor.id,name,movie.id_distributor,title from distributor inner join movie on distributor.id= id_distributor where distributor.name like"' . $_GET['1'] . '%" ');
    // $movie = $db->query("SELECT distributor.id,name,movie.id_distributor,title from distributor inner join movie on distributor_distributor where distributor.name = 'Walt Disney Pictures';");
    $titre = $movie->fetchAll();
}
if (isset($_GET['forms']) and !empty($_GET['forms'])) {
    $movie = $db->query("SELECT movie.id, movie.title, id_movie, id_genre, genre.name, genre.id FROM movie  inner JOIN movie_g movie.id=id_movie inner JOIN genre ON genre.id=id_genre WHERE genre.name='Action';");
    $titre = $movie->fetchAll(PDO::FETCH_ASSOC);
}




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- ?php echo time() ?>  -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>BlackCineRoom</title>
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
                            <a  href="utilisateur.php">Utilisateur</a>
                        </li>
                        <li class="nav-item">
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="forms">
            <form name="forms" method="GET" action="">
                <div class="forms1">
                    <input type="serch" name="s" placeholder="Rechercher un film" autocomplete="off">
                    <input type="serch" name="1" placeholder="Rechercher un distributor" autocomplete="off">
                    <select placeholder="genre" name="genre">genre
                        <option value="">Genre</option>
                        <option value="1">Action</option>
                        <option value="3">Adventure</option>
                        <option value="2">Animation</option>
                        <option value="7">Biography</option>
                        <option value="5">Comedy</option>
                        <option value="8">Crime</option>
                        <option value="4">Drama</option>
                        <option value="13">Family</option>
                        <option value="9">Fantasy</option>
                        <option value="10">Horror</option>
                        <option value="6">Mystery</option>
                        <option value="12">Romance</option>
                        <option value="11">Sci-Fi</option>
                        <option value="14">Thriller</option>

                    </select>
                    <input type="submit" name="valider" value="rechercher" />
                </div>

            </form>
    </header>
   
    <main>
    <hr>
        <section id="reponse_film">
            <div class="reponse">
                <p><strong>Résultats des recherche</strong></p>
                <?php
                if ($movie->rowCount() > 0) {

                    foreach ($titre as $M) {

                        ?>
                        <p><?php echo $M['title']; ?></p>
                        <p>
                            <?php echo $M['name']; ?>
                        </p>
                        <?php
                    }
                } else {
                    ?>
                    <p><strong>YA R POTO .</strong></p>
                    <?php
                }
                ?>

            </div>

        </section>
    </main>
    </div>

    <footer>
    <img src="a.jpg" alt="hectoplasma pokemon"width="100px">
    <img src="a.jpg" alt="hectoplasma pokemon"width="100px">
    <img src="a.jpg" alt="hectoplasma pokemon"width="100px">
    <img src="a.jpg" alt="hectoplasma pokemon"width="100px">
    
    </footer>
</body>


</html>
<!-- // function cinema()
// {
//     $db = new PDO("mysql:host=127.0.0.1;dbname=cinema;charset=utf8mb4", 'benjamin_pedro', '26021999');

//     $select = $db->query("SELECT FROM movie LIMIT 5");
//     $row = $select->fetchAll(PDO::FETCH_ASSOC);
//     print_r($row);
// }//@$keywords = $_GET("keywords");
//@$valider = $_GET("valider");
// @$valider = $_GET("valider");
// recuperation des donner 
//recuperation 
// $requete->setFetchMode(PDO::FETCH_ASSOC);
// $requete->execute();
//on recuperre les donnee
//$movie = $requete->fetchall();
//$afficher = "yes";
// $movie->execute();
// foreach ($requete as $movie);
// print_r($movie);
// cinema(); -->


<!-- //reponse avec basse de données -->
<!-- ?php if (@$afficher == "yes") { ?>
        <div id="resultats">
            <div class="nbr">test </div>
            <ol>
                ?php for ($i = 0; $i < count($tab); $i++) { ?>
                    <li>
                        <p>
                            ?php echo $tab[$i]["title"] ?>
                        <p>
                    </li>
                ?php } ?>
            </ol>
        </div>
    ?php } ?> -->