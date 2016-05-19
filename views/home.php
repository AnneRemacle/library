<section class="content">
    <h2 class="hidden">Contenu principal</h2>

    <section class="content__section section books">
        <h3 class="section__title">Les quatre derniers livres</h3>

        <?php foreach( $data[ 'books' ] as $book ): ?>
            <section class="books__card card">
                <img class="books__card--img" src="<?php echo $book->cover; ?> " alt="Couverture du <?php echo $book->title; ?>">
                <div class="books__card-right">
                    <h4 class="books__card--title"><?php echo $book -> title; ?> </h4>
                    <p class="books__card--text">
                        <?php echo substr($book->summary, 0, 250); ?>…
                    </p>
                </div>
                <a class="books__card--button" href="index.php?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors,libraries" title="Voir la fiche du livre <?php echo $book->title; ?>">Voir la fiche</a>
            </section>
        <?php endforeach; ?>
    </section>

    <section class="content__section section authors">
        <h3 class="section__title">Trois auteurs à connaître</h3>
        <?php shuffle($data['authors']); ?>

        <?php foreach(array_slice($data['authors'], 0, 3) as $author): ?>
            <section class="authors__card card">
                <img class="authors__card--img" src="<?php echo $author->photo; ?> " alt="<?php if(isset($author->photo)): ?>Photo de <?php echo $author->name ?> <?php endif; ?> ">
                <div class="authors__card-right">
                    <h4 class="authors__card--title"><?php echo $author->name; ?></h4>
                    <p class="authors__card--text">
                        <?php echo substr($author->bio, 0, 250); ?>…
                    </p>
                </div>
                <a class="authors__card--button" href="index.php?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books,editors" title="Voir la fiche de <?php echo $author->name; ?>">Voir la fiche</a>
            </section>
        <?php endforeach; ?>

    </section>
</section>
