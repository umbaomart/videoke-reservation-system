<?php
    /*
     * PDO Database Class
     * Connect to database
     * Create prepared statements
     * Bind values
     * Return rows and results
     */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct() {
            // Set DSN
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;";
            // $dsn = 'mysql:host=' . $this->host. ';dbname=' . $this->dbname;
            $options = array(
                // Increases performance incase it is connected to the database
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query
        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Execute the prepared statement - original
        public function executeStmt() {
            return $this->stmt->execute();
        }

        // Execute the prepared statement
        public function execute($data) {
            return $this->stmt->execute($data);
        }
        
        // Get result set as array of objects
        public function resultSet() {
            $this->executeStmt();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // For delete of the row of booking data -> single deletion only
        public function delete($data) {
            $sql = $this->dbh->prepare("DELETE FROM booking WHERE id = ?");
            $exec = $sql->execute(array($data['id']));
            if ($exec) {
                return json_encode(1);
            } else {
                return json_encode(0);
            }
        }

        public function getData($data) {
            $sql = $this->dbh->prepare("SELECT * FROM booking WHERE id = ?");
            $sql->execute(array($data['id']));
            return ($sql->fetchAll(PDO::FETCH_OBJ));
        }

        public function editData($sql, $id) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($id)) {
                // return 'Success Man! ';
                return $this->stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return 'Error in query';
            }
        }

        public function updateData($sql, $data) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($data)) {
                return true;
            } else {
                return false;
            }
        }

        public function getAllVid($sql) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute()) {
                return $this->stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return 'false';
            }
        }

        // Add videoke to the database
        public function addData($sql, $datas) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($datas)) {
                // return $this->dbh->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        public function deleteRowData($sql, $datas) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($datas)) {
                return true;
            } else {
                return false;
            }
        }

        public function getRowVidData($sql, $datas) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($datas)) {
                // echo print_r($this->stmt);
                $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
                // echo '<pre>',  print_r($result) , '</pre>';
            }
        }

        public function updateVidData($sql, $datas) {
            $this->stmt = $this->dbh->prepare($sql);
            if ($this->stmt->execute($datas)) {
                return true;
            } else {
                return false;
            }
        }

        // // Get result set as array of objects
        // public function resultSet() {
        //     $this->execute();
        //     return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        // }
        
        // // Get single record as object
        // public function single() {
        //     // $this->execute();
        //     return $this->stmt->fetch(PDO::FETCH_OBJ);
        // }

        // // Get the row count
        // public function rowCount() {
        //     return $this->stmt->rowCount();
        // }
    }
