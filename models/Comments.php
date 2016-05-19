<?php
    namespace Models;

    class Comments extends Model {

        protected $table = 'comments';

        public function getCommentsByUserId($id) {
            $sql = 'SELECT comments.*
                    FROM comments
                    JOIN users
                    ON comments.user_id = users.id
                    WHERE users.id= :id';

            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute(['id' => $id]);
            return $pdoSt->fetchAll();
        }

    }
