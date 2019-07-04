<?php


class Database {
    
    var $conn;
    function __construct() {

        $this->conn = new mysqli($mysql_server, $mysql_user, $mysql_pass);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        mysqli_select_db($this->conn, $mysql_db);
    }

    
    function getConnection() {
        return $this->conn;
    }


    function Insert($sql) {
        $result = mysqli_query($this->conn,$sql);
        $last_insert_id = mysqli_insert_id($this->conn);
        return $last_insert_id;
    }

    function Query($sql) {
        $result = mysqli_query($this->conn,$sql);
    }


    function getResults($sql) {
        $result = mysqli_query($this->conn,$sql);
        $results = array();
        while($rows = mysqli_fetch_assoc($result)) {
            $results[] = $rows;
        }
        mysqli_free_result($result);
        return $results;
    }

    function getRow($sql) {
        $result = mysqli_query($this->conn,$sql);
        $results = array();
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $row;
    }    


    function getVar($sql) {
        $result = mysqli_query($this->conn,$sql);
        $results = array();
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0];
        
    }

}