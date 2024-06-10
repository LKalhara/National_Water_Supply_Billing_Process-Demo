<?php
    session_start();

    if(isset($_POST['billing-history-close-btn'])){
        header('Location: customer_billing_info_input.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/customer_billing_history.css">
    <title>Customer Usage History Page</title>
</head>
<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php';?>
                </div>
                <div class="users-infor">
                    <div class="identification-infor">
                        <h2>Billing History</h2>
                        <table>
                            <tr>
                                <td><label>Customer Name:</label></td>
                                <td>
                                    <?php 
                                        if(isset($_SESSION['logged_user_fname']) && isset($_SESSION['logged_user_lname'])) {
                                            echo $_SESSION['logged_user_fname']." ".$_SESSION['logged_user_lname'];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>E-mail:</label></td>
                                <td>
                                    <?php 
                                        if(isset($_SESSION['logged_user_email'])) {
                                            echo $_SESSION['logged_user_email'];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Address:</label></td>
                                <td>
                                    <?php 
                                        if(isset($_SESSION['logged_user_address'])) {
                                            echo $_SESSION['logged_user_address'];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Water Bill Number:</label></td>
                                <td>
                                    <?php 
                                        if(isset($_SESSION['logged_user_WBN'])) {
                                            echo $_SESSION['logged_user_WBN'];
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="invoice">
                    <hr width="100%;">
                    <div class="invoice-details">
                        <div class="monthly-bill-history">
                            <h2>Billing History</h2>
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <input type="submit" class="view-btn" name="billing-history-btn" value="View">
                            </form>
                            <?php
                            if(isset($_POST['billing-history-btn'])) {
                                $con3 = mysqli_connect("localhost","root","","WaterBills");
                                $coustomID=$_SESSION['logged_user_cid'];
                                if ($con3 === false) {
                                    die("Connection error". mysqli_connect_error());
                                }
                                $sql3 = "SELECT*FROM water_usage WHERE custom_id='$coustomID' ORDER BY month;";

                                if($result = mysqli_query($con3, $sql3)){
                                    if(mysqli_num_rows($result) > 0){
                                      echo '<table class="table">';
                                        echo '<thead>';
                                          echo "<tr>";
                                            echo '<th>Month</th>';
                                            echo '<th>Consumed units</th>';
                                            echo '<th>Final bill amount</th>';
                                            echo '<th>Monthly charge for units</th>';
                                            echo '<th>Monthly charge + Fixed Charge</th>';
                                            echo '<th>VAT</th>';
                                          echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                          echo "<tr>";
                                            echo "<td>". $row['month'] ."</td>";
                                            echo "<td>". $row['unit_count'] ."</td>";
                                            echo "<td>". $row['bill_value'] ."</td>";
                                            echo "<td>". $row['monthly_charge'] ."</td>";
                                            echo "<td>". $row['fix_charge'] ."</td>";
                                            echo "<td>". $row['vat_charge'] ."</td>";
                                          echo "</tr>";
                                        }       
                                        echo "</tbody>";
                                      echo "</table>";
                                      mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }

                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="hello-btn">
                    <div class="view-inner-containner">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                        <input type="submit" class="closing-btn" name="billing-history-close-btn" value="Close">
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>