<?php
    // Codebusters.com.au
    $requestedFile = $_GET["file"];
    $theDirectory = new RecursiveDirectoryIterator("../wp-content/uploads/");
    foreach(new RecursiveIteratorIterator($theDirectory) as $fileName)
    {
        if ($requestedFile == basename($fileName)) {
            header("location: http://preview.codebusters.com.au/iru/wp-content/".$fileName);
            break;
        }
    }
?>

