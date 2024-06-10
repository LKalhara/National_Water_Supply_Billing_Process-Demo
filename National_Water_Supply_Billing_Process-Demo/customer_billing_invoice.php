<?php
session_start();
$month = "";
$units = "";
$total = 00.00;
$total_With_fix = 00.00;
$vat = 00.00;
$final_bill = 00.00;
$charge1 = $charge2 = $charge3 = $charge4 = $charge5 = 00.00;
$unit1 = $unit2 = $unit3 = $unit4 = $unit5 = 00.00;


if (isset($_POST['submit_billig_info_input'])) {
    $year_post = $_POST['year'];
    $month_post = $_POST['month'];
    $year_month = $year_post.' '.$month_post;
    $units = $_POST['consumed_units'];

    $_SESSION['current_month'] = $year_month;
    $_SESSION['current_unit'] = $_POST['consumed_units'];

    $con = mysqli_connect("localhost","root","","WaterBills");
        $message="";
        if ($con === false) {
            die("Connection error". mysqli_connect_error());
        }
        $sqlCommand3 = "SELECT * FROM water_bill_units WHERE rate_id=1;";
        $result3 = mysqli_query($con, $sqlCommand3);
        $row3 = mysqli_fetch_assoc($result3);
        $rate3 = $row3['energy_charge'];
        $fix3 = $row3['fixed_charge'];

        $sqlCommand4 = "SELECT * FROM water_bill_units WHERE rate_id=2;";
        $result4 = mysqli_query($con, $sqlCommand4);
        $row4 = mysqli_fetch_assoc($result4);
        $rate4 = $row4['energy_charge'];
        $fix4 = $row4['fixed_charge'];

        $sqlCommand5 = "SELECT * FROM water_bill_units WHERE rate_id=3;";
        $result5 = mysqli_query($con, $sqlCommand5);
        $row5 = mysqli_fetch_assoc($result5);
        $rate5 = $row5['energy_charge'];
        $fix5 = $row5['fixed_charge'];

        $sqlCommand6 = "SELECT * FROM water_bill_units WHERE rate_id=4;";
        $result6 = mysqli_query($con, $sqlCommand6);
        $row6 = mysqli_fetch_assoc($result6);
        $rate6 = $row6['energy_charge'];
        $fix6 = $row6['fixed_charge'];

        $sqlCommand7 = "SELECT * FROM water_bill_units WHERE rate_id=5;";
        $result7 = mysqli_query($con, $sqlCommand7);
        $row7 = mysqli_fetch_assoc($result7);
        $rate7 = $row7['energy_charge'];
        $fix7 = $row7['fixed_charge'];


    if (0 <= $units && $units <= 60) {
        $charge1 = $rate3 * $units;
        $unit1 = $units;

        $total = $charge1;
        $total_With_fix = $total;
        $vat = ($total_With_fix * 18) / 100;
        $final_bill = $total_With_fix + $vat;
    } elseif (61 <= $units && $units <= 90) {
        $charge1 = $rate3 * 60;
        $charge2 = $rate4 * ($units - 60);
        $unit1 = 60;
        $unit2 = $units - 60;

        $total = $charge1 + $charge2;
        $total_With_fix = $total + $fix4;
        $vat = ($total_With_fix * 18) / 100;
        $final_bill = $total_With_fix + $vat;
    } elseif (91 <= $units && $units <= 120) {
        $charge1 = $rate3 * 60;
        $charge2 = $rate4 * 30;
        $charge3 = $rate5 * ($units - 90);
        $unit1 = 60;
        $unit2 = 30;
        $unit3 = $units - 90;

        $total = $charge1 + $charge2 + $charge3;
        $total_With_fix = $total + $fix5;
        $vat = ($total_With_fix * 18) / 100;
        $final_bill = $total_With_fix + $vat;
    } elseif (121 <= $units && $units <= 180) {
        $charge1 = $rate3 * 60;
        $charge2 = $rate4 * 30;
        $charge3 = $rate5 * 30;
        $charge4 = $rate6 * ($units - 120);
        $unit1 = 60;
        $unit2 = 30;
        $unit3 = 30;
        $unit4 = $units - 120;

        $total = $charge1 + $charge2 + $charge3 + $charge4;
        $total_With_fix = $total + $fix6;
        $vat = ($total_With_fix * 18) / 100;
        $final_bill = $total_With_fix + $vat;
    } elseif (181 <= $units) {
        $charge1 = $rate3 * 60;
        $charge2 = $rate4 * 30;
        $charge3 = $rate5 * 30;
        $charge4 = $rate6 * 60;
        $charge5 = $rate7 * ($units - 180);
        $unit1 = 60;
        $unit2 = 30;
        $unit3 = 30;
        $unit4 = 60;
        $unit5 = $units - 180;

        $total = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;
        $total_With_fix = $total + $fix7;
        $vat = ($total_With_fix * 18) / 100;
        $final_bill = $total_With_fix + $vat;
    }
        
}
if (isset($_POST['Save-close-billig'])) {
    $current_month = $_SESSION['current_month'];
    $current_units = $_SESSION['current_unit'];
    $final_bill = $_SESSION['final_bill_p'];
    $total = $_SESSION['total_p'];
    $total_With_fix = $_SESSION['total_With_fix_p'];
    $vat = $_SESSION['vat_p'];
    $customId = $_SESSION['logged_user_cid'];

    $con2 = mysqli_connect("localhost", "root", "", "WaterBills");
    if ($con2 === false) {
        die("Connection error" . mysqli_connect_error());
    }
    $sql2 = "INSERT INTO water_usage(month,unit_count,bill_value,monthly_charge,fix_charge,vat_charge,custom_id) VALUES
                                        ('$current_month','$current_units','$final_bill','$total','$total_With_fix','$vat','$customId');";
    if (mysqli_query($con2, $sql2)) {
        $message = 'Registation has been completed!';
    } else {
        $message = 'Data inserting error' . mysqli_error($con);
    }
    header('Location: customer_billing_info_input.php');
}
if (isset($_POST['Save-history-billig'])) {
    $current_month = $_SESSION['current_month'];
    $current_units = $_SESSION['current_unit'];
    $final_bill = $_SESSION['final_bill_p'];
    $total = $_SESSION['total_p'];
    $total_With_fix = $_SESSION['total_With_fix_p'];
    $vat = $_SESSION['vat_p'];
    $customId = $_SESSION['logged_user_cid'];

    $con2 = mysqli_connect("localhost", "root", "", "WaterBills");
    if ($con2 === false) {
        die("Connection error" . mysqli_connect_error());
    }
    $sql2 = "INSERT INTO water_usage(month,unit_count,bill_value,monthly_charge,fix_charge,vat_charge,custom_id) VALUES
                                        ('$current_month','$current_units','$final_bill','$total','$total_With_fix','$vat','$customId');";
    if (mysqli_query($con2, $sql2)) {
        $message = 'Registation has been completed!';
    } else {
        $message = 'Data inserting error' . mysqli_error($con);
    }
    header('Location: customer_billing_history.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/customer_billing_invoice.css">
    <title>Customer Billing</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="users-infor">
                    <div class="identification-infor">
                        <h2>Billing Document Page</h2>
                        <table>
                            <tr>
                                <td><label>Customer Name:</label></td>
                                <td>
                                    <?php
                                    if (isset($_SESSION['logged_user_fname']) && isset($_SESSION['logged_user_lname'])) {
                                        echo $_SESSION['logged_user_fname'] . " " . $_SESSION['logged_user_lname'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>E-mail:</label></td>
                                <td>
                                    <?php
                                    if (isset($_SESSION['logged_user_email'])) {
                                        echo $_SESSION['logged_user_email'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Address:</label></td>
                                <td>
                                    <?php
                                    if (isset($_SESSION['logged_user_address'])) {
                                        echo $_SESSION['logged_user_address'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Water Bill Number:</label></td>
                                <td>
                                    <?php
                                    if (isset($_SESSION['logged_user_WBN'])) {
                                        echo $_SESSION['logged_user_WBN'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Relevant month:</label></td>
                                <td><?php echo $year_month; ?></td>
                            </tr>
                            <tr>
                                <td><label>Consumed Units:</label></td>
                                <td><?php echo $units; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="billing-rates">
                        <?php
                        if (isset($_POST['submit_billig_info_input'])) {
                            $con = mysqli_connect("localhost", "root", "", "WaterBills");
                            if ($con === false) {
                                die("Connection error" . mysqli_connect_error());
                            }
                            $sql = "SELECT*FROM water_bill_units;";

                            if ($result = mysqli_query($con, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table">';
                                    echo '<thead>';
                                    echo "<tr>";
                                    echo '<th>Consumption per month(kWh)</th>';
                                    echo '<th>Energy Charge (LKR/kWh)</th>';
                                    echo '<th>Fixed Charge(LKR/month)</th>';
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['consumption_per_month'] . "</td>";
                                        echo "<td>" . $row['energy_charge'] . "</td>";
                                        echo "<td>" . $row['fixed_charge'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    mysqli_free_result($result);
                                } else {
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }
                            } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="invoice">
                    <hr width="100%;">
                    <div class="invoice-details">
                        <div class="monthly-bill">
                            <h2>Invoice</h2>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <table class="table">
                                    <tr>
                                        <th>Consumption per month(kWh)</th>
                                        <th>Energy Charge (LKR/kWh)</th>
                                        <th>Fixed Charge(LKR/month)</th>
                                        <th>Charge (Rs.)</th>
                                    </tr>
                                    <tr>
                                        <td>0-60</td>
                                        <td><?php echo $rate3;?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $unit1;
                                        } ?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $charge1;
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td>61-90</td>
                                        <td><?php echo $rate4;?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $unit2;
                                        } ?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $charge2;
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td>91-120</td>
                                        <td><?php echo $rate5;?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $unit3;
                                        } ?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $charge3;
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td>121-180</td>
                                        <td><?php echo $rate6;?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $unit4;
                                        } ?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $charge4;
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Over 180</td>
                                        <td><?php echo $rate7;?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $unit5;
                                        } ?></td>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $charge5;
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" align="center">The monthly charge for
                                            <?php if (isset($_POST['submit_billig_info_input'])) {
                                                echo $units;
                                            } ?> units
                                        </th>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $total;
                                            $_SESSION['total_p'] = $total;
                                        } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">The monthly charge for
                                            <?php if (isset($_POST['submit_billig_info_input'])) {
                                                echo $units;
                                            } ?> units
                                            with Fixed Charge</th>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $total_With_fix;
                                            $_SESSION['total_With_fix_p'] = $total_With_fix;
                                        } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">VAT(18%)</th>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $vat;
                                            $_SESSION['vat_p'] = $vat;
                                        } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Final Bill</th>
                                        <td><?php if (isset($_POST['submit_billig_info_input'])) {
                                            echo $final_bill;
                                            $_SESSION['final_bill_p'] = $final_bill;
                                        } ?>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="option-btn">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="inner">
                                <div class="close-btn">
                                    <input type="submit" class="submit-close-btn" name="Save-close-billig"
                                        value="Save & Close">
                                </div>
                                <div class="history-btn">
                                    <input type="submit" class="submit-history-btn" name="Save-history-billig"
                                        value="Save & Veiw History">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>