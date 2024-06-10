<?php
    session_start();

    if(isset($_POST['billing-history-close-btn'])){
        header('Location: customer_login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/customer_billing_info_input.css">
    <title>User Input Page</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="cutomer-login-header-text">
                    <p class="cutomer-welcome-text">Welcome! <span class="logged-user-name">Mr./Ms.
                            <?php if (isset($_SESSION['logged_user_fname']) && isset($_SESSION['logged_user_lname'])) {
                                echo " " . $_SESSION['logged_user_fname'] . " " . $_SESSION['logged_user_lname'];
                            }
                            ?>
                        </span>
                    </p>
                    <p class="cutomer-welcome-phrase">Be ensure to enter the month that you need to find your bill
                        amount and
                        insert units you have used as a numeric value only. </p>
                </div>
                <div class="customer-login-form">
                    <div class="table-containeer">
                        <form action="customer_billing_invoice.php" method="POST">
                            <table>
                                <tr>
                                    <td class="table-row-text">Enter year</td>
                                    <td>
                                        <select id="year" name="year">
                                            <?php
                                                for ($i = 1950; $i < 2099; $i++) {
                                                    if($i==2024){
                                                        echo '<option value="'.$i.'"selected>'.$i.'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Enter Month</td>
                                    <td>
                                        <select id="month" name="month">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-row-text">Enter Consumed Units</td>
                                    <td><input type="number" name="consumed_units" required></td>
                                </tr>
                            </table>
                    </div>
                    <div class="form-btn">
                        <div class="reset-btn">
                            <input type="reset" class="btn btn-light" name="reset" value="Reset">
                        </div>
                        <div class="submit-btn">
                            <input type="submit" class="btn btn-light" name="submit_billig_info_input"
                                value="Calculate">
                        </div>
                    </div>
                    </form>
                    
                </div>
                <div class="hstory-containeer">
                    <div class="cutomer-history-phrase">
                        <p >The recent history according to your billing cycle can be found here.</p>
                    </div>
                    <div class="history">
                        <form action="customer_billing_history.php" method="POST">
                            <input type="submit" name="bill-history-page" value="Recent History">
                        </form>
                    </div>
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