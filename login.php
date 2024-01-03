
<?php
    require "php/loginModule.php";
    session_start();    

    if (!empty($_SESSION['User_Id'])) {
        loginUsingSession($_SESSION['User_Id']);
    } 

    if(isset($_POST['username']) && isset($_POST['password'])) {
        login($_POST['username'], $_POST['password']);
    }

    if (!empty($_GET)) {
        $msg = $_GET['error'];
    }
    else {
        $msg;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        img {
            width: 100%;
        }
        a {
            text-decoration: none;
            color: white;
        }
        body {
            background-image: url(images/image4.jpeg);
            background-attachment: fixed;
            background-size:  cover;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            backdrop-filter: contrast(70%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            height: fit-content;
            width: 40vw;
            padding: 1vw;
            padding-bottom: 1vw;
            border: .3vw solid rgb(255, 255, 255);
            background-color: rgba(255, 255, 255, 0.800);
        }
        input[type=text], input[type=password] {
            padding: 1vw 1.5vw 1vw 1.5vw;
            width: 100%;
            height: 5vh;
            background-color: rgb(255, 255, 255);
            border-color: black;
            border-width: .15vw;
            font-size: 1.5vw;
            border-radius: .3vw;
            margin-top: .5vw;
        }
        input[type=submit] {
            background-color: rgba(0, 0, 255, 0.800);
            border-radius: .3vw;
            padding: .5vw 1vw .5vw 1vw;
            margin-top: 1.5vw;
            font-size: 1vw;
            width: 100%;
        }
        .container .image {
            width: 100%;
        }

        #error {
            text-align: center;
            border: .15vw solid red;
            background-color: rgba(255, 92, 92, 0.400);
        }

        @media screen and (max-width: 600px) {
            input[type=text], input[type=password]{
                width: 100%;
                height: 5vh;
                font-size: 5vw;
            }
            body {
                align-items: flex-start;
            }
            .container {
                border: 0px solid rgba(0, 0, 0, 0);
                background-color: rgba(0, 0, 0, 0);
                width: 90vw;
                height: fit-content;
            }
            .container .image img {
                content:url(images/login2.png);
            }
            input[type=submit] { 
                font-size:5vw;
            }
    }
    </style>
</head>
<body>
    <form class="container" action="login.php" method="POST">
        <div class="image"><img src="images/login1.png" alt="">
        <?php
            if(!empty($msg)) 
                echo ("<div><input type='text' name='error' id='error' readonly value='".$msg."'></div>");
        ?>
        <div><input type="text" name="username" id="" placeholder="User Id" required></div> 
        <div><input type="password" name="password" id="" placeholder="Password" required></div>
        <div><input type="submit" value="Log In"></div>
    </form>
</body>
</html>