<?php
$idGroupp = $group->id;
$idGroupp = getIdUserInGroup($idGroupp);

$idGrouppNo = $group->id;
$idGrouppNoRes = getNoIdUserInGroup($idGrouppNo);
?>

<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <h1>Le groupe : </h1>
                    <div style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5); padding-left: 5%; padding-right: 5%;">
                        <div>
                            <h2>@<?= strtoupper($group->nameGroup) ?></h2>
                            <ul>
                                <li>Description : <?= $group->description ?></li>
                                <li>Nombre de membre(s) : <?= $numberMember->total ?></li>
                            </ul>
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
                        <div>
                            <h2>Les membres du groupe :</h2>
                            <ul>
                                <?php foreach ($idGroupp as $user):
                                    $idUserr = $user->id_users;
                                    $usernameingroup = getUsernameInGroup($idUserr);
                                    foreach ($usernameingroup as $detail): ?>
                                        <li><a href="user.php?id=<?= $user->id_users ?>"><?= $detail->username ?></a>
                                        </li>
                                    <?php endforeach;
                                endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <h2>Ajouter des membres</h2>
                            <div class="card-body">
                                <form action="group.php?id=<?= $group->id ?>" method="post">
                                    <label for="groupName">Utilisateur :</label><br/>
                                    <select name="utilisateur" id="utilisateur">
                                        <?php foreach ($users as $userno):
                                            $idUserr = $userno->id;
                                            $usernamerecup = getUsernameInGroup($idUserr);

                                            foreach ($usernamerecup as $detail): ?>
                                                <option value="<?= $userno->id ?>"><?= $detail->username ?></option>
                                            <?php endforeach;
                                        endforeach; ?>
                                    </select>
                                    <button type="submit" name="addusertoagroup">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
if (isset($success)) {
    echo $success;
}

if (!empty($errors)):?>
    <?php foreach ($errors as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>

