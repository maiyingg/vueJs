<?php
    require_once(__DIR__."/config.php");

    class DataBase extends Config{
        public function query($sql){
            $st = $this->conn->prepare($sql);
            $st->execute();
            $result = $st->fetchAll();
            return $result;
        }

        public function exec($sql){
            $st = $this->conn->prepare($sql);
            $result = $st->execute();
            return $st->rowCount();
        }
    }
?>