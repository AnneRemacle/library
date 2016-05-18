<section class="content">
    <h2 role="heading" aria-level="2" class="content__title"><?php echo $data[ 'author' ] -> name; ?></h2>

    <section class="view clearfix">
        <div class="view__top clearfix">
            <figure class="view__left">
                <img class="view__cover" src="<?php echo $data[ 'author' ] -> photo ; ?>" alt="Photo de <?php echo $data[ 'author' ] -> name; ?>" />
            </figure>
            <div class="view__right">
                <p class="view__text"><strong class="view-strong">Date de naissance&nbsp;:</strong>
                     <span class="view__info">
                         <?php if( $data[ 'author' ] -> birth_date ): ?>
                                 <?php echo $data[ 'author' ] -> birth_date; ?>
                         <?php endif; ?>
                     </span>
                </p>
                <p class="view__text"><strong class="view-strong">Date de décès&nbsp;:</strong>
                     <span class="view__info">
                         <?php if( $data[ 'author' ] -> death_date ): ?>
                                 <?php echo $data[ 'author' ] -> death_date; ?>
                            <?php else: ?>
                                /
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
                <p class="view__text"><strong class="view-strong view-strong--block">Biographie&nbsp;:</strong></p>
                <p class="view__text">
                    <?php if( $data[ 'author' ] -> bio ): ?>
                            <?php echo $data[ 'author' ] -> bio; ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>

    </section>

    <section class="others">
        <h2 role="heading" aria-level="2" class="others__title">Tous les livres de George R.R. Martin</h2>
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
        <h2 role="heading" aria-level="2" class="others__title">Les éditeurs qui ont publié George R.R. Martin</h2>
        <?php if( $data[ 'editors' ] ): ?>
            <ul class="others__list">
                <?php foreach( $data[ 'editors' ] as $editor ): ?>
                    <li class="others__item">
                        <a class="others__link" href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=books">
                            <?php echo $editor -> name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>

</section>
