<?php
    if (isset($_POST['register'])){
        $file = $_FILES['profilepic'];

        $fileName = $_FILES['profilepic']['name'];
        $fileTmpName = $_FILES['profilepic']['tmp_name'];
        $fileSize = $_FILES['profilepic']['size'];
        $fileError = $_FILES['profilepic']['error'];
        $fileType = $_FILES['profilepic']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)){
            if ($fileError === 0){
                echo "oh passed 1";
                if ($fileSize < 5000000){
                    echo "oh passed 2";
                    $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php");
                } else {
                    echo "Your file is too large.";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File type uploaded is not supported.";
        }
    
    }
    echo "yaaa";
?>