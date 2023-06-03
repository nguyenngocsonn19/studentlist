<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$age = "";
$address = "";
$telephone = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];

    if (empty($name) || empty($age) || empty($address) || empty($telephone)) {
        $errorMessage = 'All fields are required';
    } else {
        $successMessage = 'Client added successfully';

        $sql = "INSERT INTO studentlist(name, age, address, telephone) VALUES ('$name','$age','$address','$telephone')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
        } else {
            header("location:/listStudent.php");
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Create</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>New Student</h2>

        <?php if (!empty($errorMessage)) : ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong><?php echo $errorMessage; ?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><?php echo $successMessage; ?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <?php endif; ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telephone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telephone" value="<?php echo $telephone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/testphp/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-q8i/X+965DzO0Pi5X+0nzoPLaA3onzs2wvaQrY7JqIMjKtuO+8rFQgJm6hPGFi6f" crossorigin="anonymous">
    </script>
</body>

</html>