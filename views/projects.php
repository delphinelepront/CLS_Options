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
                        <h1>Ajouter un projet</h1>
                        <form action="projects.php" method="post">
                            <p><label for="name">Nom du projet :</label><br/>
                                <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>

                            <p><label for="description">Description :</label><br/>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="4"/><?php if (isset($textTask)) echo $textTask ?></textarea></p>

                            <button type="submit" name="addproject">Créer</button>
                        </form><br/>

                    </div><br/>

                </div>
            </div>

        </div>
    </div>
</section>

