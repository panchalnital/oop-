<?php

require_once("model.php");
$obj=new databaseOrperation();

if(isset($_POST['submit'])){
    $myArray=array(
        "name"=>$_POST["username"],
        "address"=>$_POST["address"],
        "mobile"=>$_POST["mobileno"]
    );

    if($obj->insertedRecord("user",$myArray)){
        header("location:in.php?msg=Record Inserted");
    }else{
        header("location:in.php?msg= no Record Inserted");
    }
}

if(isset($_POST['edit'])){
    $id = $_POST["id"];
    $where = array("id"=>$id);
    $myArray = array(
        "name"=>$_POST["username"],
        "address"=>$_POST["address"],
        "mobile"=>$_POST["mobileno"]
    );
    if($obj->update_record("user",$where,$myArray)){
    header("location:in.php?msg=Record Updated Successfully");
    }
}

if(isset($_GET['del'])){
    $id = $_GET["id"] ?? null;
    $where = array("id"=>$id);
    if($obj->deleteRecords("user",$where)){
    header("location:in.php?msg=Record Deleted Successfully");
    }
}