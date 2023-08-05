<?php
// Get the image filename from the URL query parameter
if (isset($_GET['image'])) {
    $imageFilename = $_GET['image'];

    // Set the path to your image folder
    $imageFolderPath = 'images/';

    // Make sure the image exists in the folder
    if (file_exists($imageFolderPath . $imageFilename)) {
        // Get the image MIME type
        $imageMimeType = mime_content_type($imageFolderPath . $imageFilename);

        // Set the appropriate content-type header based on the image MIME type
        header('Content-Type: ' . $imageMimeType);

        // Output the image content
        readfile($imageFolderPath . $imageFilename);
        exit;
    }
}
