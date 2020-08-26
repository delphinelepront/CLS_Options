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
                            <li>Création le : <?= $project->dateCreation ?> par <a href="user.php?id=<?= $project->id_users ?>"><?= $creator->username ?></a></li><br>
                            <li>
                                <?php foreach ($tasks as $task): ?>
                            <li>Nom de la tâche :<?= $task->title ?></li>
                            <li>Date : <?= $task->date ?></li>
                            <li>
                                <?php
                                $takenornot = $task->statutTask;
                                if ($takenornot == "takable") {
                                    ?>
                                    <h3>Lancez le chrono</h3>
                                <form action="project.php?id=<?= $project->id ?>" method="post">
                                    <button type="submit" name="startTask" value="<?= $task->id ?>">Start</button>
                                    </form><?php } else { ?>
                                    <h3>Stoppez le chrono</h3>
                                    <form action="project.php?id=<?= $project->id ?>" method="post">
                                        <button type="submit" name="stopTask" value="<?= $task->id ?>">Stop</button>
                                    </form>
                                <?php } ?>
                            </li>

                            <?php
                            if (isset($_POST['startTask'])) {
                                extract($_POST);
                                $errors = array();

                                $startTime = date("H:i:s");
                                $id_users = $_SESSION['id'];
                                $id_task = $_POST['startTask'];

                                $taskStart = startTaskTimeRecorded($startTime, $id_users, $id_task);
                                $statutTask = "taken";
                                setTaken($statutTask, $id_task);
                                $success = 'Votre tâche démarre';

                                unset($startTime);
                                unset($id_users);
                                unset($id_task);
                                header("Refresh:0");
                            }

                            if (isset($_POST['stopTask'])) {
                                extract($_POST);
                                $errors = array();

                                $stopTime = date("H:i:s");
                                $id_task = $_POST['stopTask'];

                                $taskStart = stopTaskTimeRecorded($stopTime, $id_task);
                                $statutTask = "takable";
                                setTakable($statutTask, $id_task);
                                $success = 'Votre tâche a été stoppé';

                                unset($stopTime);
                                unset($id_task);
                                header("Refresh:0");
                            }

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
                            <li>Temps passé : <?= $TimeFinal ?></li>
                            <?php endforeach; ?>

                            <?php $TimeFinalALL = ConvertisseurTime($superhoras); ?>
                            <div>
                                <h2>Temps total sur ce projet : <?= $TimeFinalALL ?></h2>
                            </div>
                    </div>
                    <br/>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
