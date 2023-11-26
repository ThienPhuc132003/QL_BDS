<?php
$servername="localhost";
$username="root";
$password="";
$database="ql_bds";
$connection = new mysqli($servername, $username, $password, $database);
if (isset($_GET["id"])){
    $id=$_GET['id'];
    
   

    $sql="DELETE FROM property WHERE ID=$id";
    $connection->query($sql);
    
}
header("location: /QL_BDS/index2.php");
exit;
?>
