<?php
    namespace Models;

    class Libraries extends Model {

        protected $table = 'libraries';

        public function getLibrariesByBookId($id) {
            $sql = 'SELECT libraries.*
                    FROM libraries
                    JOIN book_library
                    ON libraries.id = book_library.library_id
                    JOIN books
                    ON book_library.book_id = books.id
                    WHERE books.id = :id';
            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([';id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function getLibrariesByAuthorId($id) {
            $sql = 'SELECT libraries.*
                    FROM libraries
                    JOIN book_library ON
                    libraries.id = book_library.library_id
                    JOIN books ON
                    book_library.book_id = books.id
                    JOIN author_book
                    ON author_book.book_id = books.id
                    JOIN authors ON
                    author_book.author_id = authors.id
                    WHERE authors.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetchAll();
        }
    }
