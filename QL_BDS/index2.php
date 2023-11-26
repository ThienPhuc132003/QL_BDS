<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeadLine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
<body>
<header>
    <img id="logo" src="DeadLine_logo.png" alt="Logo">
    <span id="logo-text">DeadLine</span>
  </header>
    <div class="coutainer my-5">
        <a class="btn btn-outline-info" href="/QL_BDS/index.php" role="button">FULL CONTRACT</a>
        <h2>List of property</h2>
        <a class="btn btn-primary" href="/QL_BDS/create2.php" role="button">New property</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property_Code</th>
                    <th>Property_Name</th>
                    <th>Property_Type_ID</th>
                    <th>Description</th>
                    <th>District_ID</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Bed_Room</th>
                    <th>Bath_Room</th>
                    <th>Price</th>
                    <th>Installment_Rate</th>
                    <th>Avatar</th>
                    <th>Album</th>
                    <th>Property_Status_ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="ql_bds";

                $connection=new mysqli($servername,$username,$password,$database);
                if($connection->connect_error)
                {
                    die("Connection failed". $connection->connect_error);
                }
                $sql="SELECT * FROM property";
                $result = $connection->query($sql);
                if (!$result){
                    die("Invalid query". $connection->connect_error);
                }
                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[ID]</td>       
                        <td>$row[Property_Code]</td>  
                        <td>$row[Property_Name]</td>  
                        <td>$row[Property_Type_ID]</td>  
                        <td>$row[Description]</td>  
                        <td>$row[District_ID]</td>  
                        <td>$row[Address]</td>  
                        <td>$row[Area]</td>  
                        <td>$row[Bed_Room]</td>  
                        <td>$row[Bath_Room]</td>  
                        <td>$row[Price]</td>  
                        <td>$row[Installment_Rate]</td>  
                        <td>$row[Avatar]</td>  
                        <td>$row[Album]</td>  
                        <td>$row[Property_Status_ID]</td>  
                        <td>
                            <a class='btn btn-primary btn-sm' href='/QL_BDS/edit2.php?id=$row[ID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/QL_BDS/delete2.php?id=$row[ID]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
</body>
</html>