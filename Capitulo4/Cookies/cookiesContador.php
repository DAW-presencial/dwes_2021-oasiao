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
if(isset($_COOKIE['visits'])){
    setcookie("visits",++$_COOKIE['visits']);
}
else
{
    setcookie("visits",1);
}
?>
<h1>Esta cookie ha sido utilizada <?php echo $_COOKIE['visits']; ?> veces.</h1>

</body>
</html>
