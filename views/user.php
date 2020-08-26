<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="home-info">
                    <div>
                        <h1>Informations utilisateurs : </h1>

                        <h2>@<?= strtoupper($user->username) ?> (<?= $user->statut ?>)</h2>
                        <ul>
                            <li>Nom : <?= $user->nom ?></li>
                            <li>Prénom <?= $user->prenom ?></li>
                            <li>Statut : <?= $user->role ?></li>
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
                    <br/>


                </div>
            </div>

        </div>
    </div>
</section>
