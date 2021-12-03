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
    include 'connection.php';
    include 'CRUD.php';

    $crud = new CRUD();

    if(isset($_GET['read'])){
        echo $crud->read();
        back();
    }

    if (isset($_GET['name']) && isset($_GET['lastname']) && isset($_GET['surname']) && isset($_GET['phone'])){
        $name = $_GET['name'];
        $lastname = $_GET['lastname'];
        $surname = $_GET['surname'];
        $phone = $_GET['phone'];

        if(isset($_GET['create'])){
            $crud->create($name,$lastname,$surname,$phone);
            displayForm();
        }
        else if(isset($_GET['update'])){
            $crud->update($name,$lastname,$surname,$phone);
            back();
        }
        else if(isset($_GET['delete'])){
            $crud->delete($phone);
            back();
        }
        else if(isset($_GET['back'])){
            displayForm();
        }
    }
    else {
        displayForm();
    }

?>

<?php
function displayForm()
{
    ?>
    <h1>Agenda</h1>
    <form>
        <h5>Add your contact:</h5>
        <input type="text" name="name" placeholder="Name"/>
        <input type="text" name="lastname" placeholder="Lastname"/>
        <input type="text" name="surname" placeholder="Surname"/>
        <input type="text" name="phone" placeholder="Phone"/>
        <input type="submit" name="create" value="Add Contact"/>
        <input type="submit" name="read" value="Show agenda"/>
        <input type="submit" name="update" value="Update contact"/>
        <input type="submit" name="delete" value="Delete contact"/>
    </form>
    <?php
}

function back()
{?>
    <form>
        <input type="submit" name="back" value="Go back"/>
    </form>
    <?php
}

?>
</body>
</html>
