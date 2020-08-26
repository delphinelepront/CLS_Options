<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';
require 'models/taskModel.php';
require 'models/groupModel.php';


if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $project = getProject($id);

    $idCreator = $project->id_users;
    $creator = getProjectCreator($idCreator);


    $idProject = $project->id;
    $tasks = getTasksProject($idProject);


    $groups = getGroups();

    $idProj = $project->id;
    $groupproj = getGroupsWorkingonProject($idProj);


}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/project_info.php'; ?>

<?php include ("partials/footer.php"); ?>