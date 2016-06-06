<section class="content content-admin clearfix">
    	    <h1 class="content__title">Ajouter un livre</h1>

            <section class="admin-form">
            	<form  class="admin-form" action="#" method="post">
            		<div class="form-group">
            			<label class="form-label" for="title">Titre :</label>
            			<input class="form-control" type="text" name="title" id="title" placeholder="ex: Le Trône de Fer">
            		</div>
                    <div class="form-group">
            			<label class="form-label" for="summary">Résumé :</label>
            			<textarea class="form-control" name="summary" id="summary" rows="10" placeholder="ex: C'est trois nains… et ils vont à la mine…"></textarea>
            		</div>
                    <div class="form-group">
            			<label class="form-label" for="cover_url">Sélectionnez la couverture du livre</label>
            			<input class="form-control form-button--picture" type="file" name="cover_url">
        		    </div>
                    <div class="form-group">
                        <label class="form-label" for="isbn">N° ISBN :</label>
                        <input class="form-control" type="text" name="isbn" id="isbn" placeholder="ex: 978-2266154123">
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
            					<option class="form-option" value="George R.R. Martin">George R.R. Martin</option>
                                <option class="form-option" value="J.R.R. Tolkien">J.R.R. Tolkien</option>
                                <option class="form-option" value="Agatha Christie">Agatha Christie</option>

            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="author_name">Ou ajoutez-en un nouveau :</label>
            			<input class="form-control" type="text" name="author_name" id="author_name" placeholder="ex: C.S. Lewis">
            		</div>
                    <div class="form-group form-select">
            			<label class="form-label" for="nationality_id">Et sa nationalité :</label>
            			<select class="form-control form-control--select" name="nationality_id" id="nationality_id">
            					<option class="form-option" value="Anglais">Anglais</option>
                                <option class="form-option" value="Américain">Américain</option>
                                <option class="form-option" value="Français">Français</option>

            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="nationality">Ou ajoutez-en une :</label>
            			<input class="form-control" type="text" name="nationality" id="nationality" placeholder="ex: Suisse">
            		</div>
                    <div class="form-group">
            			<label class="form-label" for="photo_url">Sélectionnez sa photo</label>
            			<input class="form-control form-button--picture" type="file" name="photo_url">
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
            					<option class="form-option" value="J'ai Lu">J'ai Lu</option>
                                <option class="form-option" value="Bragelonne">Bragelonne</option>
                                <option class="form-option" value="Pygmalion">Pygmalion</option>

            			</select>
                    </div>
                    <div class="form-group">
            			<label class="form-label" for="editor_name">Ou ajoutez-en un nouveau :</label>
            			<input class="form-control" type="text" name="editor_name" id="editor_name" placeholder="ex: Pocket">
            		</div>


            		<div class="form-group">
            			<input class="form-button" type="submit" value="Publier">
            		</div>
            	</form>
            </section>
        </section>

        <aside class="aside clearfix">
            <h2 class="hidden">Menu de l'espace perso</h2>
            <nav class="aside__nav">
                <h3 class="aside__nav-title">Que voulez-vous faire?</h3>
                <ul>
                    <li class="aside__item">
                        <a class="aside__nav-link" href="administration.html">Mon profil</a>
                    </li>
                    <li class="aside__item">
                        <a class="aside__nav-link" href="add-book.html">Ajouter un livre</a>
                    </li>
                    <li class="aside__item">
                        <a class="aside__nav-link" href="modify.html">Modifier mon profil</a>
                    </li>
                </ul>
            </nav>
        </aside>