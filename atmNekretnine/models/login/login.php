<?php
    include '../../config/connection.php';
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST') {
            $email=$_POST['emailValue'];
            $password=$_POST['passwordValue'];
            $regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            $regex_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*@).*$/';
            if(!preg_match($regex_email, $email) || !preg_match($regex_password,$password)) {
                header('Location: ../../atmMarijana1992.php?error=Uneli ste neispravnu lozinku ili email');
            } else {

                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                    $secretAPIkey = '6Ld3ZNcoAAAAANvHixSPT2-tluejFnCztwvxvGlY';
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);
                    $response = json_decode($verifyResponse);
                    if($response->success){
                        $password = md5($password);
                        $query = "SELECT * FROM users WHERE email=:email AND password=:password";
                        $user = $conn->prepare($query);
                        $user->bindParam(":email", $email);
                        $user->bindParam(":password", $password);
                        $user->execute();
                        $user = $user->fetch(PDO::FETCH_ASSOC);
                        if($user){
                            $_SESSION['user']=$user;
                            header("Location: ../../zaMarijanu/sajtStranice/ltr/pocetna.php");
                            
                        } else {
                            header('Location: ../../atmMarijana1992.php?error=Kredencijali su neispravni pokusajte ponovo');
                            
                        }
                    } else {
                        header('Location: ../../atmMarijana1992.php?error=Niste prosli validaciju reCaptcha');
                        
                    }
                }

                
            }
           
    } else{
        header('Location: ../../index.php');
    }