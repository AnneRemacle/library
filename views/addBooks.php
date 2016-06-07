<section class="content content-admin clearfix">
            <h1 class="content__title">Ajouter un livre</h1>

            <section class="admin-form">
            	<form  class="admin-form" action="index.php?a=postBook&r=books" method="post">

                        <?php if(isset($_SESSION['errors']['title'])): ?>
                            <div class="error">
                            <p>
                                <?php echo $_SESSION['errors']['title'] ?>
                            </p>
                        </div>
                        <?php endif; ?>
    		<div class="form-group">
    			<label class="form-label" for="title">Titre :</label>
    			<input class="form-control" type="text" name="title" id="title" placeholder="ex: Le Trône de Fer" value="<?php echo isset($_SESSION['old_datas']['title']) ? $_SESSION['old_datas']['title'] : ''; ?>">
    		</div>

                    <?php if(isset($_SESSION['errors']['summary'])): ?>
                            <div class="error">
                            <p>
                                <?php echo $_SESSION['errors']['summary'] ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    <div class="form-group">
            			<label class="form-label" for="summary">Résumé :</label>
            			<textarea class="form-control" name="summary" id="summary" rows="10" placeholder="ex: C'est trois nains… et ils vont à la mine…"><?php echo isset($_SESSION['old_datas']['summary']) ? $_SESSION['old_datas']['summary'] : ''; ?></textarea>
            		</div>
                    <div class="form-group">
            			<label class="form-label" for="cover">Insérez l'url de la couverture du livre</label>
            			<input class="form-control" type="text" name="cover" id="cover" />
        	         </div>

                     <?php if(isset($_SESSION['errors']['isbn'])): ?>
                            <div class="error">
                            <p>
                                <?php echo $_SESSION['errors']['isbn'] ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    <div class="form-group">
                        <label class="form-label" for="isbn">N° ISBN :</label>
                        <input class="form-control" type="text" name="isbn" id="isbn" placeholder="ex: 978-2266154123" value="<?php echo isset($_SESSION['old_datas']['isbn']) ? $_SESSION['old_datas']['isbn'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="published_at">Date de publication :</label>
                        <input class="form-control" type="text" name="published_at" id="published_at" placeholder="ex: 12/03/2009">
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="pages">Nombre de pages :</label>
            			<input class="form-control" type="text" name="pages" id="pages" placeholder="ex: 666">
        		    </div>


            		<div class="form-group form-select">
            			<label class="form-label" for="author_id">Choisissez un auteur :</label>
            			<select class="form-control form-control--select" name="author_id" id="author_id">
                                                    <?php foreach( $data[ 'authors' ] as $author ): ?>
                                                            <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>
                                                    <?php endforeach; ?>
            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="author_name">Ou ajoutez-en un nouveau :</label>
            			<input class="form-control" type="text" name="author_name" id="author_name" placeholder="ex: C.S. Lewis">
            		</div>
                    <div class="form-group form-select">
            			<label class="form-label" for="nationality_id">Et sa nationalité :</label>
            			<select class="form-control form-control--select" name="nationality_id" id="nationality_id">
            				<?php foreach( $data[ 'nationalities' ] as $nationality ): ?>
                                                            <option value="<?php echo $nationality->id; ?>"><?php echo $nationality->nationality; ?></option>
                                                    <?php endforeach; ?>
            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="nationality">Ou ajoutez-en une :</label>
            			<input class="form-control" type="text" name="nationality" id="nationality" placeholder="ex: Suisse">
            		</div>
                    <div class="form-group">
            			<label class="form-label" for="photo_url">Insérez l'url de la photo de l'auteur</label>
            			<input class="form-control" type="text" name="photo_url" id="photo_url" />
        		    </div>
                    <div class="form-group">
                        <label class="form-label" for="birth_date">Date de naissance :</label>
                        <input class="form-control" type="text" name="birth_date" id="birth_date" placeholder="ex: 12/03/2009">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="death_date">Date de décès :</label>
                        <input class="form-control" type="text" name="death_date" id="death_date" placeholder="ex: 12/03/2009">
                    </div>

                    <div class="form-group form-select">
            			<label class="form-label" for="editor_id">Choisissez un éditeur :</label>
            			<select class="form-control form-control--select" name="editor_id" id="editor_id">
            				<?php foreach( $data[ 'editors' ] as $editor ): ?>
                                                            <option value="<?php echo $editor->id; ?>"><?php echo $editor->name; ?></option>
                                                    <?php endforeach; ?>
            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="editor_name">Ou ajoutez-en un nouveau :</label>
            			<input class="form-control" type="text" name="editor_name" id="editor_name" placeholder="ex: Pocket">
            		</div>


            		<div class="form-group">
            			<input class="form-button" type="submit" value="Publier">
            		</div>

                        <div>
                            <input type="hidden" name="a" value="postBook">
                            <input type="hidden" name="r" value="books">
                        </div>

            	</form>
            </section>
        </section>

    <?php include('partials/_aside.php'); ?>