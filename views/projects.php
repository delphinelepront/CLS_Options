<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <div>
                        <h1>Parcourir les projets </h1>
                        <div class="dashboardAdminList" style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5) ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Voir</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($projects as $projet): ?>
                                    <tr>
                                        <td><?= $projet->name  ?></td>
                                        <td><a href="project_info.php?id=<?= $projet->id ?>"><button type="button" class="btn btn-primary">Voir</button></a></td>
                                        <td><button type="button" class="btn btn-warning">Modifier</button></td>
                                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div><br/>

                </div>
            </div>

        </div>
    </div>
</section>
<h2>Parcourir les projets</h2>
<?php foreach ($projects as $projet): ?>
    <ul>
        <li><a href="project_info.php?id=<?= $projet->id ?>"><?= $projet->name ?></a></li>
        <li><?= $projet->description ?></li>
        <li><?= $projet->dateCreation ?></li>
        <li><?= $projet->statutProject ?></li>

        <?php
        $idCreator = $projet->id_users;
        $creator = getProjectCreator($idCreator);
        ?>
        <li>Créé par <a href="user.php?id=<?= $projet->id_users ?>"><?= $creator->username ?></a></li>
    </ul>
    <hr>
<?php endforeach; ?>