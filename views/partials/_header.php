<header class="header">
    <h1 class="hidden">Biblio - Trouvez votre prochaine lecture!</h1>
    <div class="header-top">
        <a href="index.php" title="Retour à la page d'accueil" class="header-top__container">
            <img class="header-top__logo" src="assets/img/logo-white.png" alt="Logo de la bibliothèque" width="110" height="210" />
        </a>

        <?php if(!isset($_SESSION['user'])): ?>
        <div class="header-top__nav nav">
            <a href="index.php?a=getLogin&r=auth" class="header-top__nav--item nav__item">Se connecter</a>
            <a href="index.php?a=getRegister&r=auth" class="header-top__nav--item nav__item">S'inscrire</a>
        </div>
    <?php else: ?>
        <?php $user = json_decode($_SESSION['user']); ?>
        <div class="header-top__nav nav">
            <a href="index.php?a=admin&r=page&with=books,comments" class="header-top__nav--item nav__item">Connecté en tant que <?php echo $user->pseudo?$user->pseudo:$user->email; ?></a>
            <a href="index.php?a=getLogout&r=auth" class="header-top__nav--item nav__item">Se déconnecter</a>
        </div>
    <?php endif; ?>

    </div>
    <nav id="nav" class="header-bottom header-bottom__nav nav">
        <h2 class="hidden">Navigation</h2>
        <a class="header-bottom__nav--item nav__item" href="index.php?a=index&r=books" title="Voir tous les livres">Les livres</a>
        <a class="header-bottom__nav--item nav__item" href="index.php?a=index&r=authors" title="Voir tous les auteurs">Les auteurs</a>
        <a class="header-bottom__nav--item nav__item" href="index.php?a=index&r=editors" title="Voir tous les éditeurs">Les éditeurs</a>
        <a class="header-bottom__nav--item nav__item" href="index.php?a=index&r=libraries" title="Voir la liste des bibliothèques">Les bibliothèques</a>
    </nav>
    <h2 class="header__punchline">Biblio - trouvez votre prochaine lecture!</h2>
</header>
