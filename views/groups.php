<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <div>
                        <h1>Parcourir les groupes : </h1>
                        <div class="dashboardAdminList"
                             style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5) ">
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
                                <?php foreach ($groups as $group): ?>
                                    <tr>
                                        <td><?= $group->nameGroup ?></td>
                                        <td><a href="group.php?id=<?= $group->id ?>">
                                                <button type="button" class="btn btn-primary">Voir</button>
                                            </a></td>
                                        <td>
                                            <button type="button" class="btn btn-warning">Modifier</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div>
                    <h1>Ajouter un groupe</h1>
                    <div class="card-body">
                        <form action="groups.php" method="post">
                            <p><label for="groupName">Nom de groupe :</label><br/>
                                <input type="text" name="groupName" id="groupName" class="form-control"
                                       value="<?php if (isset($groupName)) echo $groupName ?>"/></p>
                            <p><label for="description">Description :</label><br/>
                                <textarea name="description" id="description" class="form-control" cols="30"
                                          rows="4"/><?php if (isset($description)) echo $description ?></textarea>
                            </p>
                            <button type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
                <br/>

            </div>
        </div>



    </div>
    </div>
</section>
