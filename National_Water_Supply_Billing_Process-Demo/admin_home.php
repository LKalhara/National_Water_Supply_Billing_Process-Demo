<?php
session_start();
$energy_charge = 0.00;
$fix_charge = 0.00;
$message = "";
if (isset($_POST['submit-ubpate-btn'])) {
    $range = $_POST['range_selection'];
    $energy_charge = $_POST['energy'];
    $fix_charge = $_POST['fix'];

    $con = mysqli_connect("localhost", "root", "", "WaterBills");
    if ($con === false) {
        die("Connection error" . mysqli_connect_error());
    }
    $sqlCommand = "UPDATE water_bill_units
                        SET energy_charge = '$energy_charge', fixed_charge= '$fix_charge'
                        WHERE consumption_per_month = '$range';";



    if (mysqli_query($con, $sqlCommand)) {
        $message = "New record created successfully";
    } else {
        $message = 'login Fail!';
    }
}
function table()
{
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
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    
    if(isset($_POST['billing-history-close-btn'])){
        header('Location: admin_login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/admin_home.css">
    <title>Admin Home Page</title>
</head>

<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php'; ?>
                </div>
                <div class="heading-admin-text">
                    <p>Admin Home</p>
                    <hr width="100%">
                </div>
                <div class="table-section">
                    <div class="table-section-header">
                        <p>Current Rates</p>
                    </div>
                    <div class="table-section-table">
                        <?php
                        if (isset($_SESSION["Submit_btn_status"]) == 1) {
                            table();
                        }
                        ?>
                    </div>
                    <hr width="100%">
                </div>
                <div class="update-section">
                    <div class="update-section-header">
                        <p>Update Rates</p>
                    </div>
                    <div class="update-section-table">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <table class="table">
                                <tr>
                                    <th>Consumption per month(kWh)</th>
                                    <th>Energy Charge (LKR/kWh)</th>
                                    <th>Fixed Charge(LKR/month)</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="range_selection" class="range_selection-class">
                                            <option value="0-60">0-60</option>
                                            <option value="61-90">61-90</option>
                                            <option value="91-120">91-120</option>
                                            <option value="121-180">121-180</option>
                                            <option value="Over 180">Over 180</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="energy-charge">
                                            <input type="number" name="energy" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fixed-charge">
                                            <input type="number" name="fix" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="update-btn-area">
                                            <input type="submit" name="submit-ubpate-btn" value="Update">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
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