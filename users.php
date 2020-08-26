<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
$users = getUsers();
?>




<?php include ("partials/header.php"); ?>

<?php require 'views/users.php'; ?>

<?php include ("partials/footer.php"); ?>