<?php
require_once("dbconfig.php");
class databaseOrperation extends database{

    public function insertedRecord($table,$myArray){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql="";
        $sql .="INSERT INTO ".$table;
        $sql .="(".implode(",",array_keys($myArray)).") values";
        $sql .="('".implode("','",array_values($myArray))."')";


        $query=mysqli_query($this->conn,$sql);
        if($query){
            return true;
        }

    }

    public function fetchRecords($table){
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                 $array[] = $row;
            }
        return $array;
    }


    public function select_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
        // id = '5' AND m_name = 'something'
        $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
        $query = mysqli_query($this->conn,$sql);
        $row = mysqli_fetch_array($query);
        return $row;
        
    }

    public function update_record($table,$where,$fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
        // id = '5' AND m_name = 'something'
        $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
        //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
        $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
       
        if(mysqli_query($this->conn,$sql)){
        return true;
        }
    }

    public function deleteRecords($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
             $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
        if(mysqli_query($this->conn,$sql)){
            return true;
        }

    }

}