<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <style>
        .header{
            border-radius: 10px;
            font-family: 'Times New Roman', Times, serif;
        }
        nav{
            height: 90px;
            padding-left: 10px;
            padding-right: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .first{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 25px;
            color: #30cfd0;
            font-weight: bold;
        }
        .second{
            letter-spacing: 8px;
            padding-left: 24px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="board-name">
                    <a class="navbar-brand" href="Home.php">
                        <span class="first">NATIONAL WATER SYPPLY</span> <br><span class="second">BILLING PROCESS</span>
                    </a>
                    
                </div>
                <div class="btn-list">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="Home.php">Home</a>
                        <a class="nav-link" href="customer_login.php">Client Login</a>
                        <a class="nav-link" href="customer_registration.php">Client Registration</a>
                        <a class="nav-link" href="admin_login.php">Admin Panel</a>
                    </div>
                </div>
                
                </div>
            </div>
        </nav>
    </div>
</body>
</html>