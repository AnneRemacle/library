<?php
    namespace Models;

    class User extends Model {
        protected $table = 'users';

        public function check($credentials) {
            $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute([
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ]);

            return $pdoSt->fetch();
        }

        public function getCountBooksByUserId($id) {
            $sql = 'SELECT COUNT(books.id) AS nb_books
                    FROM books
                    JOIN book_user
                    ON books.id = book_user.book_id
                    JOIN users
                    ON book_user.user_id = users.id
                    WHERE users.id= :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute(['id' => $id]);
            return $pdoSt->fetch();
        }

        public function getCountCommentsByUserId($id) {
            $sql = 'SELECT COUNT(comments.id) AS nb_comments
                    FROM comments
                    JOIN users
                    ON comments.user_id = users.id
                    WHERE users.id= :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute(['id' => $id]);
            return $pdoSt->fetch();
        }
    }
