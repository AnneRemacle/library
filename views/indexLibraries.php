<section class="content">
    <h2 class="content__title">Les bibliothèques</h2>

    <ul class="content__list list">
        <?php foreach($data['libraries'] as $library): ?>
            <li class="libraries__item">
                <a class="libraries__all" href="?a=show&e=libraries&id=<?php echo $library -> id; ?>&with=books,authors" title="Voir la fiche de la bibliothèque <?php echo $library->name; ?>">
                <span class="libraries__name"><?php echo $library->name; ?></span>
                <?php if(isset($library->location)): ?>
                    Située à <?php echo $library->location; ?>
                <?php endif; ?>
                </a>
                <a href="?a=show&e=libraries&id=<?php echo $library -> id; ?>&with=books,authors" class="libraries__link">Voir la fiche</a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
