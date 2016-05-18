<section class="content">
    <h2 class="content__title">Les éditeurs</h2>

    <ul class="content__list picture-list">
        <?php foreach($data['editors'] as $editor): ?>
            <li class="picture-list__item">
                <figure class="picture-list__figure">
                    <img class="picture-list__logo" src="<?php echo $editor->logo; ?>" alt="<?php if(!isset($editor->logo)):?>Logo de l'éditeur <?php echo $editor->name; ?><?php endif; ?>" />
                </figure>
                <span class="picture-list__name"><?php echo $editor->name; ?></span>
                <a class="picture-list__link" href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=books,authors" title="Voir la fiche de l'éditeur <?php echo $editor->name; ?>">Voir la fiche <span class="sro">de l'éditeur <?php echo $editor->name; ?></span></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
