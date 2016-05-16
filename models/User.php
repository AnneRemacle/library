<?php
    namespace Models;

    class User extends Model {
        protected $table = 'users';

        public function check($credentiales) {
            $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
            $pdoSt = $this->cn->prepare($sql);
            $pdoSt -> execute([
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ]);

            return $pdoSt->fetch();
        }
    }
