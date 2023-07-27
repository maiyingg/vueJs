<?php
    class Config{
        private const HOST = "localhost";
        private const USER = "root";
        private const PASSW = "";
        private const DBNAME = "register3";
 
        private $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ""; 
        protected $conn = null;

        public function __construct(){
            try{
                $this->conn = new PDO($this->dsn, self::USER, self::PASSW);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                die("Connection Error :". $e->getMessage());
            }
            return $this->conn;
        }

        public function query($sql){
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = stripcslashes($data);
            $data = trim($data);
            return $data;
        }

        public function message($content,$status){
            return json_encode(['message'=>$content, 'error'=>$status]);
        }
    }
?>