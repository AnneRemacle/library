<?php
    namespace Models;

    class Books extends Model {

        protected $table = 'books';

        public function getBooksByAuthorId($id) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN author_book
                    ON books.id = author_book.book_id
                    JOIN authors
                    ON authors.id = author_book.author_id
                    WHERE authors.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function getBooksByEditorId($id) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN editors
                    ON editors.id = books.editor_id
                    WHERE editors.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function getBooksByLibraryId($id) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN book_library
                    ON books.id = book_library.book_id
                    JOIN libraries
                    ON book_library.library_id = libraries.id
                    WHERE libraries.id = :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute(['id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function four() {
            $sql = 'SELECT books.*
                    FROM books
                    ORDER BY created_at DESC
                    LIMIT 4';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute();
            return $pdoSt->fetchAll();
        }

        public function getBooksByUserId($id) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN book_user
                    ON books.id = book_user.book_id
                    JOIN users
                    ON book_user.user_id = users.id
                    WHERE users.id= :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute(['id' => $id]);
            return $pdoSt->fetchAll();
        }

        public function attachUser($book_id, $user_id){
            $sql = 'INSERT INTO book_user (book_id, user_id) VALUES (:book_id, :user_id)';
            $pdoSt = $this->cn->prepare($sql);

            return $pdoSt->execute([
                'book_id' => $book_id,
                'user_id' => $user_id,
            ]);
        }

        public function attachAuthor($book_id, $author_id){
            $sql = 'INSERT INTO author_book (book_id, author_id) VALUES (:book_id, :author_id)';
            $pdoSt = $this->cn->prepare($sql);

            return $pdoSt->execute([
                'book_id' => $book_id,
                'author_id' => $author_id
            ]);
        }

    }
