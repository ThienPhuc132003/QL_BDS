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
        <a class="btn btn-outline-info" href="/QL_BDS/index2.php" role="button">PROPERTY</a>
        <h2>List of full_contract</h2>
        <a class="btn btn-primary" href="/QL_BDS/create.php" role="button">New full_contract</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full_Contract_Code</th>
                    <th>Customer_Name</th>
                    <th>Year_Of_Birth</th>
                    <th>SSN</th>
                    <th>Customer_Address</th>
                    <th>Mobile</th>
                    <th>Property_ID</th>
                    <th>Date_Of_Contract</th>
                    <th>Price</th>
                    <th>Deposit</th>
                    <th>Remain</th>
                    <th>Status</th>
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
                $sql="SELECT * FROM full_contract";
                $result = $connection->query($sql);
                if (!$result){
                    die("Invalid query". $connection->connect_error);
                }
                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[ID]</td>       
                        <td>$row[Full_Contract_Code]</td>  
                        <td>$row[Customer_Name]</td>  
                        <td>$row[Year_Of_Birth]</td>  
                        <td>$row[SSN]</td>  
                        <td>$row[Customer_Address]</td>  
                        <td>$row[Mobile]</td>  
                        <td>$row[Property_ID]</td>  
                        <td>$row[Date_Of_Contract]</td>  
                        <td>$row[Price]</td>  
                        <td>$row[Deposit]</td>  
                        <td>$row[Remain]</td>  
                        <td>$row[Status]</td>  
                        <td>
                            <a class='btn btn-primary btn-sm' href='/QL_BDS/edit.php?id=$row[ID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/QL_BDS/delete.php?id=$row[ID]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
</body>
</html>