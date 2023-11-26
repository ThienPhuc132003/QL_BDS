
<?php
    // Create connection
    $servername="localhost";
    $username="root";
    $password="";
    $database="ql_bds";
    $connection = new mysqli($servername, $username, $password, $database);

    // Initialize variables
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

    // Check if the form is submitted using POST method
    if($_SERVER['REQUEST_METHOD']=='POST'){
        // Assign the submitted values to the variables
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

        // Check if all the fields are filled
        do{
            if(empty($full_contract_code) || empty($customer_name) || empty( $year_of_birth) || empty($ssn) ||
             empty($customer_address) || empty($mobile) || empty($property_id) || empty($date_of_contract) ||
              empty($price) || empty($deposit) || empty($remain) || empty($status))
            {
                // If not, set an error message
                $errorMessage="All the fields are required"; 
                break;
            }
            // add new client to database
            $sql = "INSERT INTO full_contract (Full_Contract_Code, Customer_Name,Year_Of_Birth,SSN,Customer_Address,Mobile,Property_ID,Date_Of_Contract,Price,Deposit,Remain,Status)"."VALUES ('$full_contract_code','$customer_name','$year_of_birth','$ssn','$customer_address','$mobile','$property_id','$date_of_contract','$price','$deposit','$remain','$status')";
            $result = $connection->query($sql);
            if (!$result){
                $errorMessage="Invalid querry: ".$connection->error;
                break;
            }

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
            $successMessage="Full contract added correctly";
            header("location: /QL_BDS/index.php");
            exit;
        } while(false);
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