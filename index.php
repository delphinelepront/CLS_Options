<?php
session_start();
date_default_timezone_set('Europe/Paris');

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';
require 'models/groupModel.php';

$users = getUsers();
$projects = getProjects();
$groups = getGroups();

$id_user = $_SESSION['id'];
$idProjectUser = getProjectUser($id_user);

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/homepage.php'; ?>

<?php include ("partials/footer.php"); ?>
