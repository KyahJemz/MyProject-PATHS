<?php 
    require "php/loginModule.php";
    require "php/assesmentModule.php";
    require "php/schedulingModule.php";
    
    session_start();
    error_reporting(0);

    if (!empty($_SESSION['User_Id'])) {
        verifyLogin($_SESSION['User_Id']);
    }

    if(isset($_POST['assesment'])) {
        $result = evaluateAssesment($_POST);
        endSchedule($_SESSION['User_Id']);
    } else if (isset($_POST['review'])){
        $result = getResultsByRID($_POST['value']);
    }else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - Result</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        a {
             text-decoration: none;
             color: black;
             font-weight: bold;
        }
        img {
            height: 100%;
            text-align: center;
        }
        body {
            background-image: url(images/image2.png);
            background-attachment: fixed;
            background-size:  cover;
            background-repeat: no-repeat;
            backdrop-filter: contrast(40%);
            width: 100vw;
            height: 100vh;
            display: flex;
        }
        .box {
            height: fit-content;
            width: 80vw;
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            align-items: center;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.712);
            border: .3vw solid white;
            border-radius: 1vw;
            padding: 1vw;
            position: relative;
        }
        .box2 {
            width: 100%;
            margin-top: 5vw;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
        .text {
            color: rgb(0, 0, 0)
        }
        .header {
            margin-top: 1vw;
            font-weight: bolder;
            font-size: 2vw;
        }
        .header2 {
            width: 100%;
            font-size: 1.5vw;
        }
        .box3 {
            position: relative;
            width: 25vw;
            height: 25vw;
        }
        .image {
            width: 15vw;
            height: 15vw;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.493);
            border: .3vw solid rgb(9, 114, 0);
            border-radius: 1vw;
        }
        .head {
            text-align: center;
            padding: 2vw;
            font-weight: bolder;
            font-size: 1.5vw;
            width: 100%;
        }
        .btn input {
            padding: .5vw 1vw .5vw 1vw;
            border-radius: .5vw;
            font-size: 1vw;
            background-color: rgba(0, 0, 255, 0.500); 
            border-width: .3vw;
        }
      

        @media screen and (max-width: 700px) {
            .header {
                margin-top: 4vw;
                font-weight: bolder;
                font-size: x-large;
            }
            .header2 {
                font-size: large;
            }
            .box2 {
                flex-direction: column;
                row-gap: 3vh;
                width: 100%;
                justify-content: flex-start;
            }
            .box3 {
                width: 100%;
                height: fit-content;
            }
            .image {
                height: 50vw;
                width: 50vw;
            }
            .head {
                font-size: large;
            }
            .box {
                margin-top: 5vw;
                margin-bottom: 5vw;
                width: 90vw;
                padding-bottom: 10vh;
                height: fit-content;
            }
            body {
                height: fit-content;
            }
            .btn {
                margin-top: 10vw;
            }
            .btn input {
                font-size: large;
                padding: .5vw 1vw .5vw 1vw;
                border-radius: 1vw;
                border-width: 1vw;
            }
           
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="header text">Result of Assessment</div>
        <div class="header2 text"><br><hr> <br>Top recomended courses : </div>
        <div class="box2">
            <?php
            if(isset($_POST['assesment'])) {
                $data1 = getCourseData($result['course1']);
                $data2 = getCourseData($result['course2']);
                $data3 = getCourseData($result['course3']);

            } else if (isset($_POST['review'])) {
                $x = mysqli_fetch_assoc($result);
                $data1 = getCourseData($x['course1']);
                $data2 = getCourseData($x['course2']);
                $data3 = getCourseData($x['course3']);
            }
            echo ("<div class='box3'>");
            echo ("<div class='image'><img src='images/courses/" . $data1['image'] . "' alt=''></div>");
            echo ("<div class='head'>Top 1 <br>" . $data1['name'] . "</div>");
            echo ("</div>");
        
            echo ("<div class='box3'>");
            echo ("<div class='image'><img src='images/courses/" . $data2['image'] . "' alt=''></div>");
            echo ("<div class='head'>Top 2 <br>" . $data2['name'] . "</div>");
            echo ("</div>");
        
            echo ("<div class='box3'>");
            echo ("<div class='image'><img src='images/courses/" . $data3['image'] . "' alt=''></div>");
            echo ("<div class='head'>Top 3 <br>" . $data3['name'] . "</div>");
            echo ("</div>");
            ?>
        </div>        
        <div class="btn">
            <?php 
            if(isset($_POST['assesment'])) {
                echo ("<form action='homepage.php' method='post'>");
                    echo ("<input type='submit' name='x' value='Return to Homepage'>");
                echo ("</form>");
            } else if (isset($_POST['review'])) {
                echo ("<form action='testpage.php' method='post'>");
                echo ("<input type='text' name='history' value='" . $_POST['test'] . "' hidden>");
                echo ("<input type='submit' name='x' value='View Assement'>");
                echo ("</form>");
            }
            ?>
        </div>
    </div>
</body>
</html>





