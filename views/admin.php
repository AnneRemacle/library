<section class="content clearfix content-admin">

    <h2 class="content__title">Espace perso de: <?php echo $user->pseudo; ?></h2>
    <section class="content__summary clearfix">
        <h3 class="content__summary-title">Résumé</h3>
        <p class="content__text">
            <span class="content__text--strong">Livres ajoutés&nbsp;:</span>

             <?php echo $data['books_count']->nb_books; ?>
        </p>
        <p class="content__text">
            <span class="content__text--strong">Commentaires&nbsp;:</span>
            <?php echo $data['comments_count']->nb_comments; ?>
        </p>
    </section>

    <section class="others">
        <h2 class="others__title">Les livres que j'ai ajoutés</h2>
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

    <section class="others">
        <h2 class="others__title">Mes commentaires</h2>
        <?php if( $data[ 'comments' ] ): ?>
            <ul class="others__list">
                <?php foreach( $data[ 'comments' ] as $comment ): ?>
                    <li class="others__item">
                        <a class="comments__name" href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors,libraries">
                            Livre&nbsp;: <?php echo $book->title; ?>
                        </a>
                            <p class="comments__text">
                                <?php echo $comment -> comment; ?>
                            </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>
                Vous n'avez pas de commentaires pour le moment.
            </p>
        <?php endif; ?>


    </section>

</section>
