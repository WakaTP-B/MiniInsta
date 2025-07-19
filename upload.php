<?php



$tmp = $_FILES["photo"]["tmp_name"];
$name = $_FILES["photo"]["name"];
$extension = explode(".", $name);
$ext = $extension[1];
$date = date("Ymd");
$nom = $_POST["auteur"];
$Fname = $nom . "-" . $date . "." . $ext;
$upload = move_uploaded_file($tmp, "Photos/" . $Fname);



?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>MiniInsta 📸</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body2">

    <?php if ($upload) { ?>
        <H1>Upload réussi !</H1>
        <img src="Photos/<?= $Fname ?>">
    <?php } else { ?>
        <p>Veuillez entrer une image</p>
    <?php } ?>

</body>

<footer class="footer2">
    <a href="index.php" class="btn">ACCUEIL</a>
</footer>

</html>