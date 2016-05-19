<section class="content">
    <h2 class="content__title">Connexion à votre espace perso</h2>

    <form class="content__form form" action="#" method="post">
        <div class="form-group">
            <label class="form-label" for="login">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="john@nightwatch.net">
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <input class="form-button" type="submit" name="connexion" value="Se connecter">
        </div>
        <a class="content__forgot" href="forgot.html">Mot de passe oublié?</a>
        <div>
            <input type="hidden" name="a" value="postLogin">
            <input type="hidden" name="r" value="auth">
        </div>
    </form>

    <div class="form-after">
        <div class="content__new">
            <p class="content__new-text">Pas encore de compte?</p>
            <a class="content__new-button" href="?a=getRegister&r=auth">Inscris-toi!</a>
        </div>
    </div>


</section>
