<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "dahlia";
    private $conn;

    function __construct() {
        if($_SERVER['SERVER_NAME']=="dahlia.ngt.hk"||$_SERVER['SERVER_NAME']=="www.dahlia.ngt.hk"){
            $this->host = "localhost";
            $this->user = "ucjvngtprhf4j";
            $this->password = "u3!GIE1=]#qm";
            $this->database = "db10j1jsta6jye";
        }

        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    function checkValue($value) {
        $value=mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function insertQuery($query) {
        $result = mysqli_query($this->conn,$query);
        return $result;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
