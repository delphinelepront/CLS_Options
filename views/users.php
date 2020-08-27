<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <div>
                        <h1>Parcourir les utilisateurs : </h1>
                        <div class="dashboardAdminList" style="border: solid; border-color: white; border-width: 1px; background-color: rgba(244, 248, 247, 0.5) ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Prénom, Nom</th>
                                    <th scope="col">Voir</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->prenom . ', ' . $user->nom ?></td>
                                    <td><a href="user.php?id=<?= $user->id ?>"><button type="button" class="btn btn-primary">Voir</button></a></td>
                                    <td><button type="button" class="btn btn-warning">Modifier</button></td>
                                    <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h1>Ajouter un utlisateur : </h1>

                        <?php
                        if(isset($success)){
                            echo $success;
                        }

                        if(!empty($errors)):?>
                            <?php foreach($errors as $error): ?>
                                <p><?= $error ?></p>
                            <?php  endforeach; ?>
                        <?php endif; ?>


                        <form action="users.php" method="post">
                            <p><label for="username">Pseudo :</label><br/>
                                <input type="text" name="username" id="username" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>

                            <p><label for="prenom">Prenom :</label><br/>
                                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php if (isset($prenom)) echo $prenom ?>" /></p>

                            <p><label for="nom">Nom :</label><br/>
                                <input type="text" name="nom" id="nom" class="form-control" value="<?php if (isset($nom)) echo $nom ?>" /></p>

                            <p><label for="mdp">Mot de passe :</label><br/>
                                <input type="password" name="mdp" id="mdp" class="form-control" value="<?php if (isset($mdp)) echo $mdp ?>"/></p>
                            <p><label for="mdp2">Confirmez le mot de passe :</label><br/>
                                <input type="password" name="mdp2" id="mdp2" class="form-control"/></p>
                            <button type="submit">S'inscrire</button>
                        </form><br/>
                    </div><br/>

                </div>
            </div>

        </div>
    </div>
</section>

