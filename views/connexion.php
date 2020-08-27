<div class="col-md-offset-2 col-md-8 col-sm-12">
    <div class="home-info">
        <h1>Connexion</h1>
        <form action="connexion.php" method="post">
            <p><label for="username">Pseudo :</label><br/>
                <input type="text" name="username" id="username" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>
            <p><label for="mdp">Mot de passe :</label><br/>
                <input type="password" name="mdp" id="mdp" class="form-control"/></p>
            <button type="submit">Se connecter</button>
        </form><br/>
    </div>
</div>

<?php
if(isset($success)){
    echo $success;
}

if(!empty($errors)):?>
    <?php foreach($errors as $error): ?>
        <p><?= $error ?></p>
    <?php  endforeach; ?>
<?php endif; ?>
