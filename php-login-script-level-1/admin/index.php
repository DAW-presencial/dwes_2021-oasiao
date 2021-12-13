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
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// set page title
$page_title="Admin Index";

// include page header HTML
include 'layout_head.php';

echo "<div class='col-md-12'>";

// get parameter values, and to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// tell the user he's already logged in
if($action=='already_logged_in'){
    echo "<div class='alert alert-info'>";
    echo "<strong>You</strong> are already logged in.";
    echo "</div>";
}

else if($action=='logged_in_as_admin'){
    echo "<div class='alert alert-info'>";
    echo "<strong>You</strong> are logged in as admin.";
    echo "</div>";
}

echo "<div class='alert alert-info'>";
echo "Contents of your admin section will be here.";
echo "</div>";

echo "</div>";

// include page footer HTML
include_once 'layout_foot.php';
?>
</body>
</html>
