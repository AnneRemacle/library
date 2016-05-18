<section class="content clearfix">

    <h2 class="content__title"><?php echo $data[ 'book' ] -> title; ?></h2>

    <section class="view clearfix">
        <div class="view__top clearfix">
            <figure class="view__left">
                <img class="view__cover" src="<?php echo $data[ 'book' ] -> cover; ?>" alt="Couverture du livre <?php echo $data[ 'book' ] -> title; ?>" />
            </figure>
            <div class="view__right">
                <p class="view__text"><strong class="view-strong">Auteur&nbsp;:</strong>

                    <?php foreach( $data[ 'authors' ] as $author ): ?>
                        <a class="view__link" href="?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books"><?php echo $author -> name; ?></a>
                    <?php endforeach; ?>

                </p>

                <p class="view__text"><strong class="view-strong">Éditeur&nbsp;:</strong>
                    <?php foreach( $data[ 'editors' ] as $editor ): ?>
                        <a class="view__link" href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=books"><?php echo $editor -> name; ?></a>
                    <?php endforeach; ?>
                </p>

                <p class="view__text"><strong class="view-strong">Stocké à&nbsp;:</strong>
                    <?php foreach( $data[ 'libraries' ] as $library ): ?>
                        <a class="view__link" href="?a=show&r=libraries&id=<?php echo $library -> id; ?>&with=books,authors,editors"><?php echo $library -> name; ?></a>
                    <?php endforeach; ?>
                </p>

                <p class="view__text"><strong class="view-strong view-strong--block">Résumé&nbsp;:</strong></p>
                <p class="view__text">
                    <?php echo $data[ 'book' ] -> summary; ?>
                </p>
            </div>
        </div>

    </section>

    <section class="others">
        <h2 class="others__title">D'autres livres du même auteur</h2>
        <?php if( $data[ 'books' ] ): ?>
            <ul class="others__list">
                <?php foreach( $data[ 'books' ] as $book ): ?>
                    <li class="others__item">
                        <a class="others__link" href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors,libraries">
                            <?php echo $book -> title; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>



    <section class="comments">
        <h2 class="others__title">Commentaires</h2>
        <p class="comments__alert">Vous devez être connecté pour poster un commentaire&nbsp;! <a class="comments__alert--link" href="connexion.html" title="Vers la page de connexion">Se connecter</a></p>
        <form action="#" method="post" class="form form-comment">
            <div class="form-group">
                <label class="form-label" for="login">Pseudo</label>
                <input class="form-control"type="text" id="login" name="login" placeholder="Pol Ochon"/>
            </div>
            <div class="form-group">
                <label class="form-label" for="comment">Votre commentaire</label>
                <textarea class="form-control form-control--area" rows="10" id="comment" name="comment" placeholder="Bla bla bla bla blabla"></textarea>
            </div>
            <div class="form-group">
                <input  class="form-button form-button--smallBtn" type="submit" value="Poster mon commentaire" />
            </div>
        </form>
        <ul class="comments__list">
            <li class="comments__item">
                <strong class="comments__name">Pol Ochon</strong>

                <time class="comments__date" datetime="2012-02-11T16:24:02">Publié le 11/02/2012 à 16:24</time>
                <p class="comments__text">trop chouette livre!</p>
            </li>
            <li class="comments__item">
                <strong class="comments__name">Pol Ochon</strong>

                <time class="comments__date" datetime="2012-02-11T16:24:02">Publié le 11/02/2012 à 16:24</time>
                <p class="comments__text">trop chouette livre!</p>
            </li>
            <li class="comments__item">
                <strong class="comments__name">Pol Ochon</strong>

                <time class="comments__date" datetime="2012-02-11T16:24:02">Publié le 11/02/2012 à 16:24</time>
                <p class="comments__text">trop chouette livre!</p>
            </li>
        </ul>
    </section>
</section>
