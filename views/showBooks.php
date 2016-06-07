<section class="content clearfix">

    <h2 class="content__title"><?php echo $data[ 'book' ] -> title; ?></h2>

    <section class="view clearfix">
        <div class="view__top clearfix">
            <figure class="view__left">
                <img class="view__cover" src="<?php echo $data[ 'book' ] -> cover; ?>" alt="Couverture du livre <?php echo $data[ 'book' ] -> title; ?>" />
            </figure>
            <div class="view__right">
                <p class="view__text"><strong class="view-strong">Auteur&nbsp;:</strong>

                    <?php foreach( $data[ 'authors' ] as $author ): ?>
                        <a class="view__link" href="?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books"><?php echo $author -> name; ?></a>
                    <?php endforeach; ?>

                </p>

                <p class="view__text"><strong class="view-strong">Éditeur&nbsp;:</strong>
                    <?php foreach( $data[ 'editors' ] as $editor ): ?>
                        <a class="view__link" href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=books"><?php echo $editor -> name; ?></a>
                    <?php endforeach; ?>
                </p>

                <p class="view__text"><strong class="view-strong">Stocké à&nbsp;:</strong>
                    <?php foreach( $data[ 'libraries' ] as $library ): ?>
                        <a class="view__link" href="?a=show&r=libraries&id=<?php echo $library -> id; ?>&with=books,authors,editors"><?php echo $library -> name; ?></a>
                    <?php endforeach; ?>
                </p>

                <p class="view__text"><strong class="view-strong view-strong--block">Résumé&nbsp;:</strong></p>
                <p class="view__text">
                    <?php echo $data[ 'book' ] -> summary; ?>
                </p>
            </div>
        </div>

    </section>

    <section class="others">
        <h2 class="others__title">D'autres livres du même auteur</h2>
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



    <section class="comments">
        <h2 class="others__title">Commentaires</h2>
        

        <?php if(!isset($_SESSION['user'])): ?>
                <p class="comments__alert">Vous devez être connecté pour poster un commentaire&nbsp;! <a class="comments__alert--link" href="login.php" title="Vers la page de connexion">Se connecter</a></p>
        <?php else: ?>
            <?php $user = json_decode($_SESSION['user']); ?>
                <form action="index.php?a=add&r=comments" method="post" class="form form-comment">
                    <input type="hidden" name="book_id" value="<?php echo $data['book']->id; ?>">
                    <?php if(isset($_SESSION['errors']['comment'])): ?>
                            <div class="error">
                            <p>
                                <?php echo $_SESSION['errors']['comment'] ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    <div class="form-group">
                        <label class="form-label" for="comment">Votre commentaire</label>
                        <textarea class="form-control form-control--area" rows="10" id="comment" name="comment" placeholder="Bla bla bla bla blabla"><?php echo isset($_SESSION['old_datas']['comment']) ? $_SESSION['old_datas']['comment'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input  class="form-button form-button--smallBtn" type="submit" value="Poster mon commentaire" />
                    </div>
                </form>
        <?php endif; ?>

        <ul class="comments__list">
        <?php foreach($data['comments'] as $comment): ?>
            <li class="comments__item">
                <strong class="comments__name"><?php echo $comment->author; ?></strong>

                <time class="comments__date" datetime="<?php $comment->created_at; ?>">Publié le <?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->formatLocalized('%d  %B %Y à %k:%M:%S'); ?></time>
                <p class="comments__text"><?php echo $comment->comment; ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
</section>
