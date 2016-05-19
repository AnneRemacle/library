<section class="content">
    <h2 class="content__title"><?php echo $data[ 'editor' ] -> name; ?></h2>

    <section class="view clearfix">
        <div class="view__top clearfix">
            <figure class="view__left">
                <img class="view__cover" src="<?php echo $data[ 'editor' ] -> logo; ?>" alt="Logo de l'éditeur <?php echo $data[ 'editor' ] -> name; ?>" />
            </figure>
            <div class="view__right">
                <p class="view__text"><strong class="view-strong">Date de création&nbsp;:</strong>
                    <span class="view__info">
                        <?php if( $data[ 'editor' ] -> date_of_creation ): ?>
                            <?php echo $data[ 'editor' ] -> date_of_creation; ?>
                        <?php endif; ?>
                    </span>
                </p>
                <p class="view__text"><strong class="view-strong">Nationalité&nbsp;:</strong>
                    <span class="view__info">
                        <?php if( $data[ 'nationality' ] -> nationality ): ?>
                            <?php echo $data[ 'nationality' ] -> nationality; ?>
                        <?php endif; ?>
                    </span>
                </p>
                <p class="view__text"><strong class="view-strong">Site web&nbsp;: </strong>
                    <a href="<?php echo $data['editor'] -> url; ?>" class="view__link" rel="external" title="Vers le site de l'éditeur <?php echo $data['editor'] -> name; ?>">jailu.com</a></p>
                <p class="view__text"><strong class="view-strong view-strong--block">Biographie&nbsp;:</strong></p>
                <p class="view__text">
                    <?php echo $data['editor'] -> summary; ?>
                </p>
            </div>
        </div>

    </section>

    <section class="others">
        <h2 class="others__title">Tous les livres publiés par <?php echo $data['editor'] -> name;?></h2>
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
        <?php else: ?>
            <p>
                Il n'y a pas de livre à afficher pour le moment.
            </p>
        <?php endif; ?>

    </section>

    <section class="others">
        <h2 class="others__title">Les auteurs publiés par <?php echo $data['editor']->name; ?></h2>
        <?php if( $data[ 'authors' ] ): ?>
            <ul class='others__list'>
                <?php foreach( $data[ 'authors' ] as $author ): ?>
                    <li class='others__item'>
                        <a class="others__link" href="?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books,editors" title="Voir le fiche de <?php $author->name; ?>">
                            <?php echo $author -> name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>
                Il n'y a pas d'auteur à afficher pour le moment.
            </p>
        <?php endif; ?>
    </section>

</section>
