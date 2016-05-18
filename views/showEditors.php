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
        <?php if( $data[ 'editors' ] ): ?>
            <ul class="others__list">
                <?php foreach( $data[ 'editors' ] as $editor ): ?>
                    <li class="others__item">
                        <a class="others__link" href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors,libraries">
                            <?php echo $book -> title; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <ul class="others__list">
            <li class="others__item">
                <a class="others__link" href="view-book.html">Le Trône de Fer</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-book.html">Le Trône de Fer</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-book.html">Le Trône de Fer</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-book.html">Le Trône de Fer</a>
            </li>
        </ul>
    </section>

    <section class="others">
        <h2 class="others__title">Les auteurs publiés par J'ai Lu</h2>
        <ul class="others__list">
            <li class="others__item">
                <a class="others__link" href="view-editor.html">George R.R. Martin</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-editor.html">George R.R. Martin</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-editor.html">George R.R. Martin</a>
            </li>
            <li class="others__item">
                <a class="others__link" href="view-editor.html">George R.R. Martin</a>
            </li>
        </ul>
    </section>

</section>