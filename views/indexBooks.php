<section class="content">
    <h2 class="content__title">Les livres</h2>

    <ul class="content__list list">
        <?php foreach($data['books'] as $book): ?>
            <li class="list__item">
                <img class="list__item--img" src="<?php echo $book->cover; ?>" alt="Couverture du livre <?php echo $book->title; ?>">
                <span class="list__item--title"><?php echo $book->title; ?></span>
                <p class="list__item--text">
                    <?php echo substr($book->summary, 0, 250); ?>…
                </p>
                <a class="list__item--link" href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=editors,authors,libraries,comments" title="Voir la fiche du livre <?php echo $book->title; ?>">Voir la fiche <span class="sro">du livre <?php echo $book->title; ?></span></a>
            </li>
        <?php endforeach; ?>

    </ul>
</section>
