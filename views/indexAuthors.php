<section class="content">
    <h2 class="content__title">Les auteurs</h2>

    <ul class="content__list picture-list">
        <?php foreach($data['authors'] as $author): ?>
            <li class="picture-list__item">
                <img class="picture-list__img" src="<?php echo $author->photo; ?>" alt="<?php if(isset($author->photo)): ?>Photo de <?php echo $author->name; ?> <?php endif; ?>" />
                <span class="picture-list__name"><?php echo $author->name; ?></span>
                <a class="picture-list__link" href="index.php?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books,editors" title="Voir la fiche de <?php echo $author->name; ?>">Voir la fiche <span class="sro">de <?php echo $author->name; ?></span> </a>
            </li>
        <?php endforeach; ?>

    </ul>
</section>
