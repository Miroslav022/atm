<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”robots” content="noindex"/>
    <!-- Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("prijavaForm").submit();
        }
    </script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Browser Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/ATM__1_-removebg-preview.ico"/>
    <!-- Icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- swiper -->
    <!-- Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ATM • Prijava</title>
</head>
<body>
    <div class="prijava">
        <div class="container">
            <?php
                if(isset($_GET['error'])){
                    echo "<div class='alert alert-danger' role='alert'>
                    ".$_GET['error']."
                    </div>";
                }
            
            ?>
                    <div class="error"></div>
                    <form id="prijavaForm" action="models/login/login.php" method="POST" onSubmit="return ValidateField()">
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="emailValue" aria-describedby="emailHelp" placeholder="Enter email"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="passwordValue" placeholder="Password"/>
                        </div>
                        <button class="g-recaptcha btn btn-primary" 
                        data-sitekey="6Ld3ZNcoAAAAADtpkd1jdiYUBdkBjUISNc1syFqD" 
                        data-callback='onSubmit' 
                        data-action='submit' type="submit" name="login">
                            Submit
                        </button>
                    </form>

            
        </div>
    </div>
    
<script src="assets/js/main.js"></script>
</body>
</html>