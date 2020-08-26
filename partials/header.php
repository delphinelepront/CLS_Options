<!DOCTYPE html>
<html>
<head>
    <title>CLS - OPTIONS</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="team" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/css/owl.carousel.css">
    <link rel="stylesheet" href="Public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="Public/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="Public/css/style.css">

</head>
<body>

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>

<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- LOGO TEXT -->
            <a href="index.php" class="navbar-brand">CLS</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!empty($_SESSION)) {
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                        <!-- MENU LINKS -->
                        <li><a href="users.php">Utilisateurs</a></li>
                        <li><a href="groups.php">Groupes</a></li>
                        <li><a href="projects.php">Projets</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <?php
                    } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'membre'){ ?>
                        <li><a href="deconnexion.php">Deconnexion</a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>

    </div>
</section>


