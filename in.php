<?php
require_once('control.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <title>route opreation</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <?php
                if(isset($_GET["update"])){
                //php 7
                $id = $_GET["id"] ?? null;
                $where = array("id"=>$id,);
                $row = $obj->select_record("user",$where);
            ?>
                    <form method="post" action="control.php">
                            <table class="table table-hover">
                                <tr>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                                </tr>
                                <tr>
                                    <td>User Name</td>
                                    <td><input type="text" class="form-control" name="username" value="<?php echo $row["name"]; ?>"
                                            placeholder="Enter User name"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo $row["address"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile Number</td>
                                    <td><input type="text" class="form-control" name="mobileno" placeholder="Enter Mobile number" value="<?php echo $row["mobile"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary"
                                    name="edit" value="Update"></td>
                                </tr>
                            </table>
                        </form>

            <?php }else
            { ?>        
            <form method="post" action="control.php">
                            <table class="table table-hover">
                                <tr>
                                    <td>User Name</td>
                                    <td><input type="text" class="form-control" name="username"
                                            placeholder="Enter User name"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" class="form-control" name="address" placeholder="Enter Address">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile Number</td>
                                    <td><input type="text" class="form-control" name="mobileno" placeholder="Enter Mobile number">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary"
                                            name="submit" value="Store"></td>
                                </tr>
                            </table>
                        </form>
                <?php
            }?>            
            </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

            <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                    $myrow = $obj->fetchRecords("user");
                    foreach ($myrow as $row) {
                    //breaking point
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><b><?php echo $row["mobile"]; ?></b></td>
                        <td><a href="in.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
                        <td><a href="control.php?del=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>


                    <?php
                        }

                        ?>
            </table>

            </div>
        </div>
    </div>
    </body>
</html>