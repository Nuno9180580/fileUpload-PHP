<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $name = $_FILES['file']['name']; //find file name
    $tmp_name = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];


    $tempExtension = explode('.', $name);

    $fileExtension = strtolower(end($tempExtension));

    $isAllowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileExtension, $isAllowed)) {
        $newFileName = uniqid('', true) . "." . $fileExtension;
        $fileDestination = "uploads/" . $newFileName;
        move_uploaded_file($tmp_name, $fileDestination);

        header("Location: files.php?uploadedsuccess");
        if ($error === 0) {
            /* if ($size < 30000) {
                
            } else {
                echo 'Your file is too big!';
            } */
        } else {
            echo 'There was an error, try it again!';
        }
    } else {
        echo 'Sorry, file type is not accepted';
    }
}
