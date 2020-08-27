<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <?php
                    if (empty($_SESSION)) {
                        require 'views/connexion.php';
                    } else if (!empty($_SESSION)) {?>
                        <h1><?php echo "Bonjour @" . $_SESSION['username'] . "!";?></h1>
                        <h1><?php  echo date('l jS \of F Y'); ?></h1>
                        <div class="projetsEnCours" style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5); padding-left: 5%; padding-right: 5%;">
                            <h2 style="text-align: left; margin-top: 10px;">Mes projets en cours :</h2>
                            <ul style="list-style-type: none;">


                                <?php foreach ($id_user as $id_us):
                                    $id_groups = $id_us->id_groups;
                                    $id_groups = getProjectIdInGroup($id_groups);
                                    foreach ($id_groups as $id_gr):
                                        $id_final = $id_gr->id_project;
                                        $id_final = getProjectWithFinalId($id_final);
                                        foreach ($id_final as $proj): ?>
                                            <li style="border: solid; padding-bottom: 10px; padding-top: 10px; border-width: 1px; border-radius: 30px; text-align: left; background-color: #1C846C; opacity: 0.5; color: white; font-size: 20px; padding-left: 10%;margin-bottom: 10px;"><a href="project.php?id=<?= $proj->id ?>"><?= $proj->name ?></a></li>
                                        <?php endforeach;
                                    endforeach;
                                endforeach; ?>



                            </ul>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>
