<?php
    include_once 'config/Config.php';

    class Database{
       
        public $host = HOST;
        public $user = USER;
        public $password = PASSWORD;
        public $database = DATABASE;

        public $link;
        public $error;
        
        public function __construct(){
            $this->dbConnect();
        }

        public function dbConnect(){
            try {
                $this->link = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch(PDOException $e) {
                $this->error = "Database connection Failed: " . $e->getMessage();
                return false;
            }
        }

        // insert
        public function insert($query){
            $result = $this->link->prepare($query);
            $result->execute() or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

         // insert
        public function select($query){
            $result = $this->link->prepare($query);
            $result->execute() or die($this->link->error.__LINE__);
            if($result->rowCount() > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function update($query){
            $result = $this->link->prepare($query);
            $result->execute() or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete($query){
            $result = $this->link->prepare($query);
            $result->execute() or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

    }

?>