<?php
$servername="localhost";
$username="root";
$password="";
$database="ql_bds";
$connection = new mysqli($servername, $username, $password, $database);

$id="";
$property_code ="";
$property_name ="";
$property_type_id ="";
$description ="";
$district_id ="";
$address ="";
$area ="";
$bed_room ="";
$bath_room ="";
$price ="";
$installment_rate ="";
$avatar ="";
$album="";
$property_status_id="";

$errorMessage="";
$successMessage="";
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if (!isset($_GET["id"])){
        header("location:/QL_BDS/index2.php");
        exit;
    }
    $id=$_GET["id"];
    $sql = "SELECT * FROM property WHERE ID=$id";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();
    if (!$row){
        header("location:/QL_BDS/index2.php");
        exit;
    }
    $property_code =$row["Property_Code"];
    $property_name =$row["Property_Name"];
    $property_type_id =$row["Property_Type_ID"];
    $description =$row["Description"];
    $district_id =$row["District_ID"];
    $address =$row["Address"];
    $area =$row["Area"];
    $bed_room =$row["Bed_Room"];
    $bath_room =$row["Bath_Room"];
    $price =$row["Price"];
    $installment_rate =$row["Installment_Rate"];
    $avatar =$row["Avatar"];
    $album=$row["Album"];
    $property_status_id=$row["Property_Status_ID"];
}
else{
    $id=$_POST["ID"];
    $property_code=$_POST["Property_Code"];
    $property_name=$_POST["Property_Name"];
    $property_type_id=$_POST["Property_Type_ID"];
    $description=$_POST["Description"];
    $district_id=$_POST["District_ID"];
    $address=$_POST["Address"];
    $area=$_POST["Area"];
    $bed_room=$_POST["Bed_Room"];
    $bath_room=$_POST["Bath_Room"];
    $price=$_POST["Price"];
    $installment_rate=$_POST["Installment_Rate"];
    $avatar=$_POST["Avatar"];
    $album=$_POST["Album"];
    $property_status_id=$_POST["Property_Status_ID"];

    do{
        if(empty($id) || empty($property_code) || empty($property_name) || empty($property_type_id) ||
        empty($description) || empty($district_id) || empty($address) || empty($area) ||
        empty($bed_room) || empty($bath_room) || empty($price) || empty($installment_rate) ||
        empty($avatar) || empty($album) || empty($property_status_id))
            {
                // If not, set an error message
                $errorMessage="All the fields are required"; 
                break;
            }
            $sql = "UPDATE property SET Property_Code='$property_code', Property_Name='$property_name', Property_Type_ID='$property_type_id',Description='$description', District_ID='$district_id', Address='$address', Area='$area',Bed_Room='$bed_room', Bath_Room='$bath_room', Price='$price', Installment_Rate='$installment_rate', Avatar='$avatar',Album=' $album',Property_Status_ID='$property_status_id' WHERE ID=$id";

            $result=$connection->query($sql);
            if (!$result){
                $errorMessage="Invailid query: ".$connection->error;
                break;
            }
            $successMessage="Full contract update correctly";
            header("location:/QL_BDS/index2.php");
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
        <h2>New Property</h2>

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
                <label class="col-sm-3 col-form-label">Property_Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Property_Code"value="<?php echo $property_code;?>">
                </div>
            </div>
            <!-- Customer_Name input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Property_Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Property_Name"value="<?php echo $property_name;?>">
                </div>
            </div>
            <!-- Year_Of_Birth input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Property_Type_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Property_Type_ID"value="<?php echo $property_type_id;?>">
                </div>
            </div>
            <!-- SSN input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Description"value="<?php echo $description;?>">
                </div>
            </div>
            <!-- Customer_Address input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">District_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="District_ID"value="<?php echo $district_id;?>">
                </div>
            </div>
            <!-- Mobile input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Address"value="<?php echo $address;?>">
                </div>
            </div>
            <!-- Property_ID input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Area"value="<?php echo $area;?>">
                </div>
            </div>
            <!-- Date_Of_Contract input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Bed_Room</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Bed_Room"value="<?php echo $bed_room;?>">
                </div>
            </div>
            <!-- Price input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Bath_Room</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Bath_Room"value="<?php echo $bath_room;?>">
                </div>
            </div>
            <!-- Deposit input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <col-sm-6">
                    <input type="text" class="form-control"name="Price"value="<?php echo $price;?>">
                </div>
            </div>
            <!-- Remain input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Installment_Rate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Installment_Rate"value="<?php echo $installment_rate;?>">
                </div>
            </div>
            <!-- Status input field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Avatar</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Avatar"value="<?php echo $avatar;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Album</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Album"value="<?php echo $album;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Property_Status_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"name="Property_Status_ID"value="<?php echo $property_status_id;?>">
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
                    <a class="btn btn-primary"href="/QL_BDS/index2.php"role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div> 
</body>
</html>