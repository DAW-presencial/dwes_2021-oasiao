<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
include ('myClass.php');
include('mySubClass.php');

$first = new mySubClass(1,2,3);
$second = new myClass(4,5,6);
$first->echoValues();
echo "<br>" . mySubClass::VAR5;
echo "<br>";
$first->echoValue();
echo "<br>";
$second->echoValues();



?>
</body>
</html>