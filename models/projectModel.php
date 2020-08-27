<?php
// FONCTION QUI AMENE TOUS PROJETS
function getProjects ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI COMPTE NOMBRE TOTAL PROJETS
function countProjects ()
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) AS totalp FROM project');
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE 1 PROJET
function getProject ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE id = ?');
    $query->execute(array($id));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
        header('Location:index.php');
    }
    $query->closeCursor();
}

// FONCTION QUI récupère les projets d'un utilisateur
function getProjectUser ($id_user)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE id_users = ?');
    $query->execute(array($id_user));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE LE CREATOR D'UN PROJET
function getProjectCreator ($idCreator)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(array($idCreator));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
        header('Location:index.php');
    }
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UN USER
function addProject ($name, $description, $dateCreation, $statutProject, $idCreator)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO project (name, description, dateCreation, statutProject, id_users) VALUES (?, ?, ?, ?, ?)');
    $query->execute(array($name, $description, $dateCreation, $statutProject, $idCreator));
    $query->closeCursor();
}

// FONCTION QUI AMENE TOUS PROJETS
function getProjectCreated($idCreator)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE id_users = ? ORDER BY id DESC LIMIT 1');
    $query->execute(array($idCreator));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// /////////////////////////////////////////////
// FONCTION POUR RECUPERER LES PROJET D'UN USER PROVENANT DE GROUPE(S)

// FONCTION QUI LES ID DE GROUPE DE L'USER RENSEIGNÉ
function getProjectMemberInGroup($id_user)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM groups_member WHERE id_users = ?');
    $query->execute(array($id_user));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE L'ID DES PROJETS DES GROUPES QUI Y PARTICIPENT
function getProjectIdInGroup($id_groups)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project_groupmember WHERE id_groups = ?');
    $query->execute(array($id_groups));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE PROJETS DES ID DE GROUPE DONT FAIT PARTIE L'USER
function getProjectWithFinalId($id_final)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE id = ?');
    $query->execute(array($id_final));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}
