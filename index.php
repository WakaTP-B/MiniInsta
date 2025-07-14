<?php
function getUploadedPhotos($dir = "photos/")
{
    $photos = [];

    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $photos[] = $dir . $file;
            }
        }
    }

    // Tri par ordre décroissant (dernières photos en haut)
    rsort($photos);
    return $photos;
}

$photos = getUploadedPhotos();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>MiniInsta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>MiniInsta 📸</h1>
    <a href="upload.php">Publier une photo</a>

    <div class="gallery">
        <?php foreach ($photos as $photo): ?>
            <img src="<?= htmlspecialchars($photo) ?>" alt="photo">
        <?php endforeach; ?>
    </div>
</body>

</html>