<?php
    session_start();
    if (isset($_POST['submit'])) {
        $alogin_admin_Name = $_POST['adminUserName'];
        $alogin_admin_password = $_POST['adminUserPasscode'];
        $_SESSION['Submit_btn_status'] = 1;

        $con = mysqli_connect("localhost", "root", "", "WaterBills");
        $message = "";
        if ($con === false) {
            die("Connection error" . mysqli_connect_error());
        }
        $sqlCommand = "SELECT * FROM admin_login 
                            WHERE adminUserName='$alogin_admin_Name' AND adminPassword='$alogin_admin_password';";

        $result = mysqli_query($con, $sqlCommand);
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            header('Location: admin_home.php');
        } else {
            $message = 'login Fail!';
        }
    }
    if(isset($_POST['billing-history-close-btn'])){
        header('Location: Home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/admin_login.css">
    <title>Admin Login Page</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="cutomer-login-header-text">
                    <p class="cutomer-login-text">Admin Login</p>
                </div>
                <div class="customer-login-form">
                    <div class="table-containeer">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <table>
                                <tr>
                                    <td class="table-row-text">User Name</td>
                                    <td><input type="text" name="adminUserName" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Password</td>
                                    <td><input type="password" name="adminUserPasscode" required></td>
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