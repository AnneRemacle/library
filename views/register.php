<section class="content">
    <h2 class="content__title">Inscription</h2>
    <form class="content__form form" action="index.php" method="post">

        <?php if(isset($_SESSION['errors']['pseudo'])): ?>
            <div class="error">
                <p>
                    <?php echo $_SESSION['errors']['pseudo'] ?>
                </p>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label class="form-label" for="pseudo">Nom d'utilisateur</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Pol Ochon" value="<?php echo isset($_SESSION['old_datas']['pseudo']) ? $_SESSION['old_datas']['pseudo'] : ''; ?>">
        </div>

        <?php if(isset($_SESSION['errors']['email'])): ?>
            <div class="error">
                <p>
                    <?php echo $_SESSION['errors']['email'] ?>
                </p>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="exemple@exemple.com" value="<?php echo isset($_SESSION['old_datas']['email']) ? $_SESSION['old_datas']['email'] : ''; ?>" />
        </div>

        <?php if(isset($_SESSION['errors']['password'])): ?>
            <div class="error">
                <p>
                    <?php echo $_SESSION['errors']['password'] ?>
                </p>
            </div>
        <?php endif; ?>
         <div class="form-group">
            <label class="form-label" for="password">Choisissez un mot de passe</label>
            <input class="form-control" type="password" name="password" id="password" value="<?php echo isset($_SESSION['old_datas']['password']) ? $_SESSION['old_datas']['password'] : ''; ?>" />
        </div>

        <div class="form-group">
            <input class="form-button" type="submit" name="connexion" value="S'inscrire" />
        </div>

        <div>
            <input type="hidden" name="a" value="postRegister">
            <input type="hidden" name="r" value="auth">
        </div>
    </form>

    <?php if(isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
        } ?>
    <?php if(isset($_SESSION['old_datas'])) {
        unset($_SESSION['old_datas']);
        } ?>

    <div class="form-after">
        <div class="content__new">
            <p class="content__new-text">Déjà inscrit?</p>
            <a class="content__new-button" href="?a=getLogin&r=auth">Connecte-toi!</a>
        </div>
    </div>
</section>
