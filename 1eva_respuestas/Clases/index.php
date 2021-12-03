<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercio 4</title>
</head>
<body>
<?php
//include ('myClass.php');
//include('mySubClass.php');

function carga($clase){
    include __DIR__."/Class/$clase.php";
}

spl_autoload_register('carga');

$obj = new mySubClass();

$obj-> a = "Hello world!";
echo $obj->a;

echo $obj -> echoValues();

echo "Nos da warning porque es un private y no tenemos acceso desde una subclase!!";

?>
</body>
</html>