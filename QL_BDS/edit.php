<?php
$servername="localhost";
$username="root";
$password="";
$database="ql_bds";
$connection = new mysqli($servername, $username, $password, $database);

$id="";
$full_contract_code ="";
$customer_name ="";
$year_of_birth ="";
$ssn ="";
$customer_address ="";
$mobile ="";
$property_id ="";
$date_of_contract ="";
$price ="";
$deposit ="";
$remain ="";
$status ="";

$errorMessage="";
$successMessage="";
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if (!isset($_GET["id"])){
        header("location:/QL_BDS/index.php");
        exit;
    }
    $id=$_GET["id"];
    $sql = "SELECT * FROM full_contract WHERE ID=$id";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();
    if (!$row){
        header("location:/QL_BDS/index.php");
        exit;
    }
    $full_contract_code =$row["Full_Contract_Code"];
    $customer_name =$row["Customer_Name"];
    $year_of_birth =$row["Year_Of_Birth"];
    $ssn =$row["SSN"];
    $customer_address =$row["Customer_Address"];
    $mobile =$row["Mobile"];
    $property_id =$row["Property_ID"];
    $date_of_contract =$row["Date_Of_Contract"];
    $price =$row["Price"];
    $deposit =$row["Deposit"];
    $remain =$row["Remain"];
    $status =$row["Status"];
}
else{
    $id=$_POST["ID"];
    $full_contract_code =$_POST["Full_Contract_Code"];
    $customer_name =$_POST["Customer_Name"];
    $year_of_birth =$_POST["Year_Of_Birth"];
    $ssn =$_POST["SSN"];
    $customer_address =$_POST["Customer_Address"];
    $mobile =$_POST["Mobile"];
    $property_id =$_POST["Property_ID"];
    $date_of_contract =$_POST["Date_Of_Contract"];
    $price =$_POST["Price"];
    $deposit =$_POST["Deposit"];
    $remain =$_POST["Remain"];
    $status =$_POST["Status"];
    do{
        if(empty($id) || empty($full_contract_code) || empty($customer_name) || empty( $year_of_birth) || empty($ssn) ||
             empty($customer_address) || empty($mobile) || empty($property_id) || empty($date_of_contract) ||
              empty($price) || empty($deposit) || empty($remain) || empty($status))
            {
                // If not, set an error message
                $errorMessage="All the fields are required"; 
                break;
            }
            $sql = "UPDATE full_contract SET Full_Contract_Code='$full_contract_code', Customer_Name='$customer_name', Year_Of_Birth='$year_of_birth', SSN='$ssn', Customer_Address='$customer_address', Mobile='$mobile', Property_ID='$property_id', Date_Of_Contract='$date_of_contract', Price='$price', Deposit='$deposit', Remain='$remain', Status='$status' WHERE ID=$id";
            $result=$connection->query($sql);
            if (!$result){
                $errorMessage="Invailid query: ".$connection->error;
                break;
            }
            $successMessage="Full contract update correctly";
            header("location:/QL_BDS/index.php");
            exit;
    }while(true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeadLine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mu-5">
        <h2>New Full_contract</h2>

        <?php
        if(!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fabe show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="ID"value="<?php echo $id;?>">
            <!-- Full_Contract_Code input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full_Contract_Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Full_Contract_Code"value="<?php echo $full_contract_code;?>">
                </div>
            </div>
            <!-- Customer_Name input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer_Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Customer_Name"value="<?php echo $customer_name;?>">
                </div>
            </div>
            <!-- Year_Of_Birth input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Year_Of_Birth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Year_Of_Birth"value="<?php echo $year_of_birth;?>">
                </div>
            </div>
            <!-- SSN input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SSN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="SSN"value="<?php echo $ssn;?>">
                </div>
            </div>
            <!-- Customer_Address input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer_Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Customer_Address"value="<?php echo $customer_address;?>">
                </div>
            </div>
            <!-- Mobile input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mobile</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Mobile"value="<?php echo $mobile;?>">
                </div>
            </div>
            <!-- Property_ID input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Property_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Property_ID"value="<?php echo $property_id;?>">
                </div>
            </div>
            <!-- Date_Of_Contract input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date_Of_Contract</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Date_Of_Contract"value="<?php echo $date_of_contract;?>">
                </div>
            </div>
            <!-- Price input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Price"value="<?php echo $price;?>">
                </div>
            </div>
            <!-- Deposit input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Deposit</label>
                <col-sm-6">
                    <input type="text" class="form-control"name="Deposit"value="<?php echo $deposit;?>">
                </div>
            </div>
            <!-- Remain input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Remain</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Remain"value="<?php echo $remain;?>">
                </div>
            </div>
            <!-- Status input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Status"value="<?php echo $status;?>">
                </div>
            </div>

            <?php
            if( !empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert'aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-primary"href="/QL_BDS/index.php"role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div> 
</body>
</html>