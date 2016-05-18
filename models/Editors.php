<?php
    namespace Models;

    class Editors extends Model {

        protected $table = 'editors';

        public function getEditorsByBookId($id) {
            $sql = 'SELECT editors.*
                    FROM editors
                    JOIN books
                    ON editor_id = editors.id
                    WHERE books.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function getEditorsByAuthorId($id) {
            $sql = 'SELECT editors.*
                    FROM editors
                    JOIN books
                    ON editors.id = books.editor_id
                    JOIN author_book
                    ON author_book.book_id = books.id
                    JOIN authors
                    ON author_book.author_id = authors.id
                    WHERE authors.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetchAll();
        }
        public function getEditorNationality($id) {
            $sql = 'SELECT nationalities.*
	                FROM nationalities
	                JOIN editors ON
                    editors.id = :id
                    WHERE nationalities.id = editors.nationality_id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetch();
        }
    }
