<?php
    require "php/loginModule.php";
    
    session_start();

    if (!empty($_SESSION['User_Id'])) {
        verifyLogin($_SESSION['User_Id']);
    }
    require "php/schedulingModule.php";

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
    <title>P.A.T.H.S. - SSC-RDC</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        a {
             text-decoration: none;
             font-weight: bold;
        }
        img {
            height: 100%;
            width: 100%;
        }
        body {
            background-image: url(images/image2.png);
            background-attachment: fixed;
            background-size:  cover;
            background-repeat: no-repeat;
            backdrop-filter: contrast(40%);
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        .box {
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }
        .logo {
            position: relative;
            top: 5vh;
            left: 5vw;
            width: 20vw;
            height: fit-content;
        }
        .title {
            top: 10vh;
            position: relative;
            left: 5vw;
            font-size: 2.5vw;
        }
        .logout {
            position: absolute;
            top: 2vh;
            right: 2vw;
            font-size: 1.5vw;
            font-weight: bolder;
        }
        .logout a {
            color: black;
        }
        .footer {
            position: absolute;
            bottom:  15vh;
            width: 100vw;
            height: fit-content;
            padding-left: 5vw;
            padding-right: 5vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: center;
        }
        .footer .leftmenu {
            height: 100%;
            display: flex;
            flex-direction: row;
            column-gap: 1vw;
            text-align: center;
            align-self: flex-end;
        }
        .footer .rightmenu {
            height: 100%;
            display: flex;
            row-gap: 1vw;
            flex-direction: column;
            text-align: center;
        }
        .footer a, input {
            text-align: center;
            color: rgb(255, 255, 255);
            border-radius: .5vw;
            background-color: rgba(0, 0, 255, 0.800); 
            padding: 1vw 3vw 1vw 3vw;
            font-size: 1vw;
            border-width: .2vw;
        }
        .disabled {
            background-color: rgba(0, 0, 255, 0.300); 
        }
        .windowBox {
            position: absolute;
            z-index: 2;
            top: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.600);
           
        }
        .window {
            width: 25vw;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.750);
            padding: 1vw;
            border-radius: 1vw;
            border: .3vw solid white;
            
        }
        .window .windowInput {
            padding: 1vw 2vw 1vw 2vw;
            width: 100%;
            height: 5vh;
            background-color: rgb(255, 255, 255);
            border-color: black;
            border-width: .2vw;
            font-size: 1.5vw;
            border-radius: .5vw;
            margin-top: .5vw;
            color: black;
        }
        .window .windowBtn {
            background-color: rgba(0, 0, 255, 0.800);
            padding: .5vw 1vw .5vw 1vw;
            border-radius: .5vw;
            width: 100%;
            color: rgb(255, 255, 255);
            margin-top: 1.5vw;
        }
        .window .windowHeader {
            font-size: 1.5vw;
        }
        
        @media screen and (max-width: 700px) {
            .logout {
                font-size: 5vw;
            }
            .logo {
                left: 50%;
                transform: translate(-50%);
                width: 60vw;
            }
            .title {
                top: 10vh;
                text-align: center;
                font-size: x-large;
                left: 0vw;
            }
            .footer {
                top: 60vh;
                width: 100%;
                flex-direction: column;
                row-gap: 2vw;
            }
            .footer .leftmenu {
                flex-direction: column;
                row-gap: 2vw;
                align-self: center;
            }
            .footer .rightmenu {
                row-gap: 2vw;
            }
            .footer a, input {
                font-size: 5vw;
                border-width: 1vw;
                border-radius: 2vw;
            }
            .window{
                width: 90vw;
                padding: 3vw;
                border-width: 1vw;
            }
            .window .windowInput {
                font-size: 5vw;
                margin-top: 1vw;
            }
            .window .windowHeader {
                font-size: 4vw;
            }
            .window .windowBtn {
                margin-top: 3vw;
            }
        }
    </style>
</head>
<body>
    <script>
        function endl() {
            alert('xyz');
        }
    function warn(msg) {
        switch(msg) {
            case 1:
                alert("Request Submitted, Please wait for your schedule");
                break;
            case 2:
                alert("Passwerd Has Been Save Successfully");
                break;
            case 3:
                alert("Process Failed, Please Try Again");
                break;
            case 4:
                alert("Current Password Does Not Match, Please Try Again");
                break;
        }
    }
    </script>
    <div class="box">
        <div class="logout"><a href="index.php">LOGOUT  ></a></div>
        <div class="header">
            <div class="logo">
                <img src="images/logo1.png" alt="SSC-RDC">
            </div>
            <div class="title">
                <p>SAN SEBASTIAN COLLEGE - RECOLETOS<br>DE CAVITE</p>
            </div>
        </div>
        <div class="footer">
            <div class="leftmenu">
                <div><form action='homepage.php' method='post'><input type='submit' name="update" value='USER SETTINGS'></form></div>
                <div><form action='history.php' method='post'><input type='submit' name="history" value='HISTORY'></form></div>
            </div>
            <div class="rightmenu">
                <?php
                    if (checkIfOpen($_SESSION['User_Id'])) {
                        echo ("<div><form action='testpage.php' method='post'><input type='submit' name='start' value='TAKE ASSESSMENT'></form></div>");
                    } else {
                        echo ("<div><form action='testpage.php' method='post'><input type='submit' class='disabled' name='start' value='TAKE ASSESSMENT' disabled></form></div>");
                    }
                ?>
                <div>
                    <?php
                    if (checkIfNotScheduled($_SESSION['User_Id'])){
                        echo ("<form action='php/schedulingModule.php' method='post'><input onclick='warn(1)' type='submit' name='btn' value='REQUEST SCHEDULE'></form>");
                    } else {
                        echo ("<form action='php/schedulingModule.php' method='post'> <input class='disabled' type='btn' name='start' value='REQUEST SCHEDULE' disabled></form>");
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        $showWindow = 0;
        if (isset($_POST['update'])){
            $showWindow = 1;
        }
        if (isset($_POST['save'])) {
            $currentPassword = mysqli_fetch_array(getAccountsById($_SESSION['User_Id']) );
            if ($currentPassword['Password'] == $_POST['currentPassword']) {
                updatePassword($_SESSION['User_Id'], $_POST['newPassword']);
                echo ("<script type='text/javascript'>warn(2);</script>");
            } else {
                echo ("<script type='text/javascript'>warn(4);</script>");
            }
        }

        if ($showWindow == 1) {
            echo ("
                <div class='windowBox'>
                    <div class='window'>
                        <div class='windowHeader'>Change Password</div>
                        <div class='form'>
                            <form action='homepage.php' method='post'>
                                <div><input class='windowInput' type='password' name='currentPassword' placeholder='Current Password' required></div> 
                                <div><input class='windowInput' type='password' name='newPassword' placeholder='New Password' required></div>
                                <div><input class='windowBtn' type='submit' name='save' value='Save Changes'></div>
                            </form>
                        </div>
                    </div>
                </div>
            ");
        }
        ?>
    </div>
</body>
</html>

