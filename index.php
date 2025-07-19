<?php

// Création du dossier Photos en cas ou il n'existe pas
$dossier = "Photos";
if (!is_dir($dossier)) {
    mkdir($dossier);
}

//Fonction pour récuperer le noms des photos dans le dossier Photos, avec Tri par date récente => ancienne
function getPhotos()
{

    $Photos_dir = opendir("Photos");
    $nom_photos = [];

    do {
        $fichier = readdir($Photos_dir);

        if ($fichier && $fichier != "." && $fichier != "..") {
            $chemin_fichier = "Photos/" . $fichier;
            $nom_photos[] = [
                "nom" => $fichier,
                "date" => filectime($chemin_fichier)
            ];
        }
    } while ($fichier);

    // Tri par date décroissante
    usort($nom_photos, function ($a, $b) {
        return $b['date'] <=> $a['date'];
    });
    return $nom_photos;
}

$nom_photos = getPhotos();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>MiniInsta 📸</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body1">

    <header>

        <h1>MiniInsta<br>📸</h1>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="submit">
                <input type="file" name="photo">
                <input type="submit" value="Envoyer">
            </div>
            <input type="text" name="auteur" placeholder="Auteur" required>
        </form>

    </header>

    <div class="gallery">

        <?php foreach ($nom_photos as $photo) {
            $auteur_date = explode("-", $photo['nom']);
            $auteur = $auteur_date[0];
            $date = $auteur_date[1];
            $year = substr($date, 0, 4);
            $month = substr($date, 4, 2);
            $day = substr($date, 6, 2);
        ?>
            <figure>
                <img src="Photos/<?= $photo['nom'] ?>" alt="photo">
                <figcaption><?= $auteur . " : Le $day" . "/" . $month . "/" . $year ?></figcaption>
            </figure>
        <?php
        }
        ?>
    </div>
</body>

</html>