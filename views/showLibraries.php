<section class="content">
    <h2 class="content__title"><?php echo $data['library']->name; ?></h2>

    <section class="view clearfix">
        <div class="view__top clearfix">
            <div class="view__left gmap" id="gmap">
                <!-- GMap here -->
            </div>
            <div class="view__right">
                <p class="view__text"><strong class="view-strong">Adresse&nbsp;: </strong>
                     <span class="view__info">
                         <?php if( $data[ 'library' ] -> address ): ?>
                             <?php echo $data[ 'library' ] -> address; ?>
                         <?php endif; ?>
                     </span>
                </p>
                <p class="view__text"><strong class="view-strong">Numéro de téléphone&nbsp;: </strong>
                     <span class="view__info">
                        <?php if( $data['library']->phone ): ?>
                            <?php echo $data['library']->phone; ?>
                        <?php endif; ?>
                     </span>
                </p>
                <p class="view__text"><strong class="view-strong">Site web&nbsp;: </strong>
                     <a href="http://www.google.com" class="view__link" rel="external" title="Vers le site de <?php echo $data['library']->name; ?>">
                         <?php if( $data['library']->url ): ?>
                             <?php echo $data['library']->url; ?>
                         <?php else: ?>
                             <p>
                                 /
                             </p>
                         <?php endif; ?>
                     </a>
                 </p>
                <p class="view__text"><strong class="view-strong view-strong--block">Heures d'ouverture&nbsp;:</strong></p>
                <ul class="view__text view__list">
                    <li class="view__item">
                        <span class="view__item--strong">Lundi&nbsp;:</span>
                        <?php if( $data['library']->opening_monday ): ?>
                            <?php echo $data['library']->opening_monday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Mardi&nbsp;:</span>
                        <?php if( $data['library']->opening_tuesday ): ?>
                            <?php echo $data['library']->opening_tuesday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Mercredi&nbsp;:</span>
                        <?php if( $data['library']->opening_wedn ): ?>
                            <?php echo $data['library']->opening_wedn; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Jeudi&nbsp;:</span>
                        <?php if( $data['library']->opening_thursday ): ?>
                            <?php echo $data['library']->opening_thursday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Vendredi&nbsp;:</span>
                        <?php if( $data['library']->opening_friday ): ?>
                            <?php echo $data['library']->opening_friday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Samedi&nbsp;:</span>
                        <?php if( $data['library']->opening_saturday ): ?>
                            <?php echo $data['library']->opening_saturday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                    <li class="view__item">
                        <span class="view__item--strong">Dimanche&nbsp;:</span>
                        <?php if( $data['library']->opening_sunday ): ?>
                            <?php echo $data['library']->opening_sunday; ?>
                        <?php else: ?>
                            <p>
                                Pas d'informations
                            </p>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>

    </section>

    <section class="others">
        <h2 class="others__title">Tous les livres situés à <?php echo $data['library']->name; ?></h2>
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

    <!-- <section class="others">
        <h2 class="others__title">Les auteurs de <?php echo $data['library']->name; ?></h2>


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
    </section> -->

</section>
