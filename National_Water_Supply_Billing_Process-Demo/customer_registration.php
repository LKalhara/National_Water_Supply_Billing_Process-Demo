<?php
if (isset($_POST['submit'])) {
    $first_Name = $_POST['fname'];
    $last_Name = $_POST['lname'];
    $c_address = $_POST['address'];
    $e_mail = $_POST['email'];
    $water_Bill_No = $_POST['water_bill_Number'];
    $user_Name = $_POST['user_name'];
    $user_password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "WaterBills");
    $message = "";
    if ($con === false) {
        die("Connection error" . mysqli_connect_error());
    }
    $sqlCommand = "INSERT INTO customer(firstName,lastName,address,email,wbNo,userName,userPassword) VALUES
                        ('$first_Name','$last_Name','$c_address','$e_mail','$water_Bill_No','$user_Name','$user_password');";

    if (mysqli_query($con, $sqlCommand)) {
        $message = 'Registation has been completed successfully!';
    } else {
        $message = 'Data inserting error' . mysqli_error($con);
    }
}
if (isset($_POST['billing-history-close-btn'])) {
    header('Location: Home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/customer_registration.css">
    <title>Customer Registration Page</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="cutomer-login-header-text">
                    <p class="cutomer-login-text">Client Registration</p>
                </div>
                <div class="customer-login-form">
                    <div class="table-containeer">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <table>
                                <tr>
                                    <td class="table-row-text">First Name</td>
                                    <td><input type="text" width="200px" name="fname" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Last Name</td>
                                    <td><input type="text" name="lname" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Address</td>
                                    <td><textarea name="address" required></textarea></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Email</td>
                                    <td><input type="email" name="email" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Water Bill Number</td>
                                    <td><input type="number" name="water_bill_Number" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">User Name</td>
                                    <td><input type="text" name="user_name" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Password</td>
                                    <td><input type="password" name="password" required></td>
                                </tr>
                            </table>
                    </div>
                    <div class="form-btn">
                        <div class="reset-btn">
                            <input type="reset" class="btn btn-light" name="reset" value="Reset">
                        </div>
                        <div class="submit-btn">
                            <input type="submit" class="btn btn-light" name="submit" value="Submit">
                        </div>
                    </div>
                    <div>
                        <span class="feedback-mssage"><?php if (isset($_POST['submit'])) {
                            echo $message;
                        } ?></span>
                    </div>
                    </form>
                    <div class="hello-btn">
                        <div class="view-inner-containner">
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <button type="submit" class="closing-btn" name="billing-history-close-btn">
                                    <img src="image_files/previous.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>