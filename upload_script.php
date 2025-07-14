<?php
if (isset($_POST['author']) && isset($_FILES['photo'])) {
    $author = strtolower(trim($_POST['author']));
    $photo = $_FILES['photo'];

    if ($photo['error'] === UPLOAD_ERR_OK) {
        $originalName = basename($photo['name']);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $filenameOnly = pathinfo($originalName, PATHINFO_FILENAME);

        $timestamp = date("YmdHis");
        $safeAuthor = preg_replace('/[^a-z0-9]+/', '-', $author); // nettoie le nom
        $safeFilename = preg_replace('/[^a-z0-9]+/', '-', strtolower($filenameOnly));
        $newName = "$timestamp-$safeAuthor-$safeFilename.$extension";

        $targetDir = "photos/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        move_uploaded_file($photo['tmp_name'], $targetDir . $newName);
    }
}

header("Location: index.php");
exit();
