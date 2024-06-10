<?php
    session_start();
    if (isset($_POST['submit_login'])) {
        $clogin_user_Name = $_POST['userName'];
        $clogin_user_password = $_POST['passcode'];

        $con = mysqli_connect("localhost", "root", "", "WaterBills");
        $message = "";
        if ($con === false) {
            die("Connection error" . mysqli_connect_error());
        }
        $sqlCommand = "SELECT * FROM customer 
                            WHERE userName='$clogin_user_Name' AND userPassword='$clogin_user_password';";
        $sqlCommand2 = "SELECT * FROM customer 
                                WHERE userName='$clogin_user_Name';";



        $result = mysqli_query($con, $sqlCommand);
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $result2 = mysqli_query($con, $sqlCommand2);
            $row2 = mysqli_fetch_assoc($result2);
            $logged_fName = $row2["firstName"];
            $logged_lName = $row2["lastName"];
            $logged_address = $row2["address"];
            $logged_email = $row2["email"];
            $logged_WBN = $row2["wbNo"];
            $logged_cid = $row2["cid"];

            $_SESSION['logged_user_fname'] = $logged_fName;
            $_SESSION['logged_user_lname'] = $logged_lName;
            $_SESSION['logged_user_address'] = $logged_address;
            $_SESSION['logged_user_email'] = $logged_email;
            $_SESSION['logged_user_WBN'] = $logged_WBN;
            $_SESSION['logged_user_cid'] = $logged_cid;
            header('Location: customer_billing_info_input.php');
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
    <link rel="stylesheet" href="css_files/customer_login.css">
    <title>Customer Login Page</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="cutomer-login-header-text">
                    <p class="cutomer-login-text">Client Login</p>
                </div>
                <div class="customer-login-form">
                    <div class="table-containeer">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <table>
                                <tr>
                                    <td class="table-row-text">User Name</td>
                                    <td><input type="text" name="userName" required></td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Password</td>
                                    <td><input type="password" name="passcode" required></td>
                                </tr>
                            </table>
                    </div>
                    <div class="form-btn">
                        <div class="reset-btn">
                            <input type="reset" class="btn btn-light" name="reset" value="Reset">
                        </div>
                        <div class="submit-btn">
                            <input type="submit" class="btn btn-light" name="submit_login" value="Submit">
                        </div>
                    </div>
                    <div>
                        <span class="feedback-mssage"><?php if (isset($_POST['submit_login'])) {
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