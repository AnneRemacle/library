<?php
namespace Models;

    class Model {
        protected $table = '';
        protected $cn = null;

        public function __construct() {
            $dbConfig = parse_ini_file('db.ini');
            $pdoOptions = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ];

            try {
                $dsn = sprintf(
                    '%s:dbname=%s;host=%s',
                    $dbConfig['driver'],
                    $dbConfig['dbname'],
                    $dbConfig['host']
                );
                $this->cn = new \PDO(
                    $dsn,
                    $dbConfig['username'],
                    $dbConfig['password'],
                    $pdoOptions
                );
                $this->cn->exec('SET CHARACTER SET UTF8');
                $this->cn->exec('SET NAMES UTF8');
            } catch (\PDOException $exception) {
                die($exception->getMessage());
            }
        }

        public function all() {
            $sql = sprintf('SELECT * FROM %s', $this->table);
            $pdoSt = $this->cn->query($sql);

            return $pdoSt->fetchAll();
        }

        public function find($id) {
            $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->table);
            $pdoSt = $this->cn->prepare($sql);
            $pdoSt->execute([':id' => $id]);

            return $pdoSt->fetch();
        }

        public function save($fields) {
            $sFieldsNames = implode('`,`', array_keys($fields));
            $sFieldsJokers = implode(', :', array_keys($fields));

            $sql = sprintf('INSERT INTO %s(`%s`) VALUES(:%s)',
                $this->table,
                $sFieldsNames,
                $sFieldsJokers);
            $pdoSt = $this->cn->prepare($sql);
            foreach (array_keys($fields) as $field) {
                $pdoSt->bindValue(':' . $field, $fields[$field]);
            }
            $pdoSt->execute();

            return $this->cn->lastInsertId();
        }
    }
