<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>
<body>
<?php

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $date = $_POST['date'];
    echo showOutput($name,$lastname,$date);
    echo fileUploaded();
    back();

}
else if(isset($_POST['back']))
{
    displayForm();
}
else {
    displayForm();
}

function fileUploaded()
{
    $output = "";
    if (empty($_FILES['files'])) {
        $output .= "You didn't upload any file.";

    } else {
        foreach ($_FILES['files']['error'] as $key => $error) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $name= $_FILES['files']['name'][$key];
            if ($error == UPLOAD_ERR_OK) {
                move_uploaded_file($tmp_name, __DIR__."/ficheros/$name");
            }
        }

        if ($_FILES['files']['name'][0] === ""){
            $output .= "<br>You didn't added a file in the first input.<br>";
        }else
        {
            $output .= "<br>1. File name: " . $_FILES['files']['name'][0] . " => Size file: " . $_FILES['files']['size'][0] . " bytes.";
        }

        if ($_FILES['files']['name'][1] === ""){
            $output .= "You didn't added a file in the second input.<br>";
        }
        else {
            $output .= "<br>2. File name: " . $_FILES['files']['name'][1] . " => Size file: " . $_FILES['files']['size'][1] . " bytes.";
        }

        return $output;
    }
}

function showOutput($name,$lastname,$date){
    $output = "These are the values you entered:<br>";
    $output.= "Name: $name <br> Last Name: $lastname <br> Date of birth: $date";
    return $output;
}

function back()
{?>
    <form method="post">
        <input type="submit" name="back" value="Go back"/>
    </form>

    <?php
}

function displayForm(){
?>
<form method="post" enctype="multipart/form-data">
    Name <input type="text" name="name" placeholder="Name"/>
    Last name <input type="text" name="lastname" placeholder="Last name"/>
    Date of birth <input type="date" name="date" placeholder="Date of birth"/>
    Select a file to upload:
    <input name="files[]" type="file"/>
    <input name="files[]" type="file"/>
    <input type="submit" value="Submit" name="submit">
</form>
<?php } ?>


</body>
</html>
