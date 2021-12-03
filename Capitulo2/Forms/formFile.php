<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    fileUploaded();

}
else {
    displayForm();
}
function displayForm()
{
    ?>
    <h1>Formulario</h1>
    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input name="files[]" type="file" multiple="multiple"/>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
}

function fileUploaded()
{
    if (empty($_FILES)) {
        return "Ha habido un problema";
    } else {
        foreach ($_FILES['files']['error'] as $key => $error) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $name= $_FILES['files']['name'][$key];
            if ($error == UPLOAD_ERR_OK) {
                move_uploaded_file($tmp_name, __DIR__."/$name");
            }
        }
        echo "Uploaded!";
    }
}


?>


</body>
</html>
