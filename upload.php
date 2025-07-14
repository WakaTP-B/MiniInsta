<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Upload - MiniInsta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Publier une photo</h1>
    <form action="upload_script.php" method="POST" enctype="multipart/form-data">
        <label for="author">Votre nom :</label>
        <input type="text" name="author" id="author" required>

        <label for="photo">Photo :</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>

        <button type="submit">Publier</button>
    </form>

    <a href="index.php">← Retour à l'accueil</a>
</body>
</html>
