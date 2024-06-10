<?php
    
    if(isset($_POST['Customer_Login'])) {
        header('Location: customer_login.php');
    }
    if(isset($_POST['Admin_Login'])) {
        header('Location: admin_login.php');
    }
    if(isset($_POST['Customer_Registration'])) {
        header('Location: customer_registration.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/Home.css">
    <title>NWS Home Page</title>
</head>
<body>
    <div class="containeer">
        <div class="outter-containeer">
            <div class="inner-container">
                <div class="header-element">
                    <?php include 'includes_files/header.php';?>
                </div>
                <div class="cutomer-login-header-text">
                    <p class="cutomer-login-text">WELCOME</p>
                    <p class="water-phara">
                        Welcome to our home page, where we celebrate the beauty and importance of water while championing the cause of 
                        conservation. Water is not just a resource; it's a lifeline, sustaining every aspect of our lives and the planet we call home.
                         Through simple yet impactful measures, we can all play a role in preserving this precious resource for future generations. 
                         From fixing leaks to embracing water-efficient practices, every action counts. Let's unite in our commitment to
                          water conservation, ensuring that every drop is cherished and every life is sustained.
                         Together, let's make a splash in the journey toward a sustainable future
                    </p>
                </div>      
                
                <div class="customer-login-form">
                    <div class="table-containeer">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">            
                            </div>
                            <div class="form-btn">
                                <div class="c_login-btn">
                                    <input type="submit" class="btn btn-light" name="Customer_Login" value="Client Login">
                                </div>
                                <div class="c_reg-btn">
                                    <input type="submit" class="btn btn-light" name="Customer_Registration" value="Client Registration">
                                </div>
                                <div class="adminLog-btn">
                                    <input type="submit" class="btn btn-light" name="Admin_Login" value="Admin Login">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>