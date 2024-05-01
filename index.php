<?php
    function validateUploadImage($file) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file['name']);
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or a fake image
        $check = getimagesize($file['tmp_name']);

        if($check !== false) {
            echo "FILE is an image " . $check['mime'] . "</br>";
        } else {
            echo "FILe is not image. <br>";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"  && $imageFileType != "tiff") {
            echo "Sorry, is only allowed to upload jpg, jpeg, png and tiff file type";
            $uploadOk = 0;
        }

        if($uploadOk = 0) {
            echo "Sorry, your file is not uploaded";
        } else {
            if(move_uploaded_file($file['tmp_name'], $target_file)) {
                echo "The file " . htmlspecialchars(basename( $file["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
        validateUploadImage( $_FILES["fileToUpload"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "POST" enctype="multipart/form-data">
        <label for="fileToUpload">Select file to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="submit" name = "fileToUpload">
    </form>
</body>
</html>