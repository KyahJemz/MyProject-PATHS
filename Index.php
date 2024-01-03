<?php
    require "php/loginModule.php";
    session_unset();
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - SSC-RDC</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
        }
        img {
            height: 100%;
            width: 100%;
        }
        body {
            background-color: black;
            
        }
        .box {
            height: 100vh;
            width: 100vw;
            display: flex;
            
        }
        #top {
            background-image: url(images/image1.png);
            background-size:  cover;
            background-repeat: no-repeat;
        }
        .heading2 {
            text-align: left;

        }
        .leftimage{
            width: 150vw;
            overflow: hidden;
        }
        .about {
            margin:  50px;
        }
        .text{
            color: white;
            text-align: center;
            font-size: 1.6vw;
        }
        .textbox {
            color: white;
            width: 100%;
            align-self: center;
            justify-self: center;
            text-align: center;
        }
        .btn {
            width: 100%;
            height: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn a{
            background-color: rgba(0, 0, 255, 0.521); 
            border-radius: 20px;
            padding: 2vh 5vw 2vh 5vw;
            color: white;
            text-decoration: none;
            font-size: 1.3vw;
        }
        .logo {
            position: absolute;
            width: 18vw;
            top: 5vh;
        }
        .logo2{
            right: 5vw;
        }
        .logo1{
            left: 5vw;
        }

        @media screen and (max-width: 600px) {
            .logo {
                top: 5vh;
                width: 30vw;
            }
            .text {
                font-size: 5vw;
                text-align: center;
                margin: 20px;
            }
            .leftimage {
                visibility: hidden;
                position: absolute;
                width: 0px;
            }
            .abouttext {
                text-align: justify;
            }
            .about {
                margin: 10px;
            }
            .btn a{
                font-size: 5vw;
                padding: 2vh 20vw 2vh 20vw;
            }
        }
    </style>
</head>
<body>
    <div id="top" class="box">
        <div class="logo logo1">
            <img src="images/logo1.png" alt="SSC-RDC">
        </div>
        <div class="logo logo2">
            <img src="images/logo2.png" alt="SSC-RDC">
        </div>
        <div class="textbox">
            <div class="title text ">
                <h1 class="heading1">P. A. T. H. S.</h1>
            </div>
            <div class="text">
                <p><br> PREFERRED ASSESSMENT TEST FOR HIGHSCHOOL STUDENT <br> 
                    SAN SEBASTIAN COLLEGE - RECOLETOS DE CAVITE<br><br></p>
            </div>
            <div class="btn">
                <a href="login.php">LOGIN</a>
            </div>
        </div>
    </div>
    <div id="bot" class="box">
        <div class="leftimage">
            <img src="images/image3.jpg" alt="SSC-RDC">
        </div>
        <div class="about">
            <div class="title text">
                <h1 class="heading2">Gearing up for the future.</h1>
            </div>
                <div class="text abouttext">
                    <br>
                    <p>PATHS is an online assessment tool that will help incoming college students decide what programs they are most fit for. They will answer different types of questions regarding the core academic subject, the questionnaires will also include questions about their general interests, skills, aptitudes, preferences, and other things related to their career. <br><br>
                        The results will be based on the answers of the students in the assessment. In this manner, the students will know their compatibility and capacity with the programs they actually like and with what our assessment recommends.</p>
                </div>
        </div>
    </div>
</body>
</html>
