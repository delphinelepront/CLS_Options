<?php $TimeFinal = 0;
$superhoras = 0 ?>

<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <div class="DetailsProject"
                         style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5)">
                        <h3> <?= strtoupper($project->name) ?> (<?= $project->statutProject ?>) </li></h3>
                        <ul style="list-style-type: none;">
                            <li>Description : <?= $project->description ?></li>
                            <li>Création le : <?= $project->dateCreation ?> par <a
                                        href="user.php?id=<?= $project->id_users ?>"><?= $creator->username ?></a></li>
                            <li><h2>Groupe(s) assignés </h2>
                                <?php foreach ($groupproj as $gj):
                                    $idGroup = $gj->id_groups;
                                    $groupID = getGroupInProject ($idGroup);
                                    foreach ($groupID as $detGroup): ?>
                                        <ul>
                                            <li><a href="group.php?id=<?= $detGroup->id ?>"><?= $detGroup->nameGroup ?></a></li>
                                            <li><?= $detGroup->description ?></li>

                                            <?php
                                            $idGroup = $detGroup->id;
                                            $numberMember = countUsersInGroup ($idGroup)
                                            ?>
                                            <li>Nombre membres : <?= $numberMember->total ?></li>
                                            <li><a href="group.php?id=<?= $detGroup->id ?>">Ajouter des membres</a></li>
                                        </ul>
                                    <?php endforeach;
                                endforeach; ?></li>
                            <br>
                            <li>
                                <?php foreach ($tasks as $task): ?>

                                    <?php

                                    $idTaskk = $task->id;
                                    $task_timerecorded = getAllTaskTimeRecorded($idTaskk);
                                    //var_dump($task_timerecorded);
                                    $totalintsec = 0;
                                    foreach ($task_timerecorded as $detail):
                                        $h1 = strtotime($detail->startTime);
                                        $h2 = strtotime($detail->stopTime);
                                        $Startsec = gmdate("U", $h2 - $h1);
                                        $intsec = intval($Startsec);
                                        if ($intsec > 0) {
                                            $totalintsec = $totalintsec + $intsec;
                                        }
                                        $h1 = 0;
                                        $h2 = 0;
                                        $intsec = 0;
                                        $Startsec = 0;
                                    endforeach;

                                    /* puis on traduit en secondes */
                                    $horas = $totalintsec;
                                    //var_dump($horas);

                                    if ($horas > 0) {
                                        $TimeFinal = ConvertisseurTime($horas);
                                    }

                                    $superhoras = $superhoras + $horas;
                                    ?>
                                <?php endforeach; ?>

                                <?php $TimeFinalALL = ConvertisseurTime($superhoras); ?>
                                <div>
                                    <h2>Temps total sur ce projet : <?= $TimeFinalALL ?></h2>
                                </div>
                            </li>
                    </div>
                    <br/>
                    <div>
                        <h2>Ajouter une tâche</h2>
                        <div class="card-body">
                            <form action="project_info.php?id=<?= $project->id ?>" method="post">
                                <p><label for="title">Title :</label><br/>
                                    <input type="text" name="title" id="title" class="form-control"
                                           value="<?php if (isset($title)) echo $title ?>"/></p>
                                <p><label for="textTask">textTask :</label><br/>
                                    <textarea name="textTask" id="textTask" class="form-control" cols="30"
                                              rows="4"/><?php if (isset($textTask)) echo $textTask ?></textarea></p>
                                <button type="submit" name="addtask">Ajouter</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <h2>Assigner le projet à un groupe</h2>
                    <div class="card-body">
                        <form action="project_info.php?id=<?= $project->id ?>" method="post">
                            <label for="proj">Groupes :</label><br/>
                            <select name="proj" id="proj">
                                <?php foreach ($groups as $groupo): ?>
                                    <option value="<?= $groupo->id ?>"><?= $groupo->nameGroup ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="addgrouptoproject">Ajouter</button>
                        </form>
                    </div>


                    <?php
                    if (isset($success)) {
                        echo $success;
                    }

                    if (!empty($errors)):?>
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>
