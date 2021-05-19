<?php
session_start();
include 'includes/class-autoload.inc.php';

if (isset($_POST['submit'])){

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileName = $_FILES['file']['type'];

    $fileExt = explode('/', $fileName);

    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 50000000){
                $fileNameNew = "sportbud-pf-$userid.".$fileActualExt;
                $fileDestination = '../profilepictures/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: makesports.php");

            }else{
                echo "File is too powerfull!";
            }
        }else{
            echo "There was aan error uploading your file!";
        }
    }else{
        echo "You cannot upload files of this type!";
    }
}

?>

<form class="formMargin" action="testcon.php" method="POST" enctype="multipart/form-data">
    <table class="formTable m-auto">
        <tbody>         
            <tr>
                <td><input type="file" name="file"/></td>
            </tr>
            <tr>
                <td><input type="submit" value="Upload" name="submit" class="myButton"/></td>
            </tr> 
        </tbody>
    </table>
</form>