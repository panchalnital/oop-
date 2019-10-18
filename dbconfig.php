<?php

class database{

    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect("localhost","root","","route");
    
        if(!$this->conn){
        echo "Error connection --".mysqli_connect_error();
        }
    }
}