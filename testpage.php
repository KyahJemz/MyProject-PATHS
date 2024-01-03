<?php 
    require "php/loginModule.php";
    require "php/assesmentModule.php";
    
    session_start();

    if (!empty($_SESSION['User_Id'])) {
        verifyLogin($_SESSION['User_Id']);
    }

    if(isset($_POST['start'])) {

    } else if (isset($_POST['history'])){
        $data = getAssesment($_POST['history']);
        $data = mysqli_fetch_assoc($data);
    } else {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - Assesment</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        img {
            width: 100%;
            height: 100%;
        }
        body {
            background-image: url(images/image2.png);
            background-attachment: fixed;
            background-size:  cover;
            background-repeat: no-repeat;
            backdrop-filter: contrast(40%);
            width: 100vw;
            height: fit-content;
            padding: 5vh 0px 5vh 0px;
            overflow-x: hidden;
        }
        .boxContainer {
            width: 75vw;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.712);
            border: 2px solid white;
            padding: 1vw;
            border-radius: 1vw;
            display: flex;
            flex-direction: column;
        }
        .container {
            margin: auto;
            text-align: end;
        }
        .headerImage {
            width: 100%;
        }

        table {
            border: .3vw solid rgb(0, 0, 0);
            text-align: center;
        }
        table tr th {
            padding: 1vw;
        }
        table tr td {
            font-size: 1vw;
        }
        table tr th p {
            text-align: left;
        }
        .tHeader {
            border-bottom: .3vw solid black;
            font-size: 1.5vw;
        }
        .question{
            border-right: .2vw solid rgb(0, 0, 0);
            width: 40vw;
            font-size: 1.25vw;
            
        }
        input[type=radio] {
            width: 2vw;
            height: 2vw;
            margin: 1vw;
        }
        tr:nth-child(even){background-color: #00000033}
        tr:nth-child(odd){background-color: #ffffffa2}

        .container .btn input {
            padding: .5vw 3vw .5vw 3vw;
            border-radius: 10px;
            text-align: center;
            font-size: 1vw;
            background-color: rgba(0, 0, 255, 0.800);
            text-decoration: none;
            color: rgb(0, 0, 0);
        }
        .container .btn {
            margin-top: 2vw;
            margin-bottom: 1vw;
            text-align: center;
        }
        .back {
            position: absolute;
            top: 2vh;
            left: 2vw;
            font-weight: bolder;
            font-size: 1.5vw;
        }
        .back a {
            color: black;
            text-decoration: none;
        }

        @media screen and (max-width: 700px) {
            
           body {
            height: fit-content;
            overflow: hidden;
            padding: 3vw;
            margin: 0;
            overflow-y: auto;
           }
           .boxContainer{
                width: 100%;
                margin-top: 7vw;
           }
            .container {
                overflow-x: scroll;
                margin: 0;
            }
            table {
                width: 200vw;
            }
            .question {
                width: 100%;
            }
            .back {
                font-size: 4vw;
            }
            .tHeader {
                font-size: 4vw;
            }
            input[type=radio] {
                height: 5vw;
                width: 5vw;
                margin: 3vw;
            }
            .question{ 
                width: 70vw;
                font-size: 3vw;
            }
            .container .btn input {
                font-size: 4vw;
            }
            .container .btn {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="back"><a href="homepage.php">< Back</a></div>
    <div class="boxContainer">
        <div class="headerImage">
            <img src="images/assessmentBanner.png" alt="SSC-RDC">
        </div>
        <div class="container">
            <form action="result.php" method="POST">
                <table>
                    <tr>
                        <th class="question tHeader">Personality Assesment</th>
                        <th class="tHeader">Strongly<br>Disagree</th>
                        <th class="tHeader">Somewhat<br>Disagree</th>
                        <th class="tHeader">Somewhat<br>Agree</th>
                        <th class="tHeader">Strongly<br>Agree</th>
                    </tr>
                    <?php
                        if(isset($_POST['start'])) {
                            $questions = getQuestions();
                            $num = 1;
                            while ($row = mysqli_fetch_array($questions)) {
                                echo ("<tr>");
                                    echo ("<th class='question'><p>".$num.". ".$row['Question']."</p</th>");
                                    echo ("<td><input type='radio' name='".$row['Question_Id']."' id='".$row['Question_Id']."-1' value='4' required></td>");
                                    echo ("<td><input type='radio' name='".$row['Question_Id']."' id='".$row['Question_Id']."-2' value='3' required></td>");
                                    echo ("<td><input type='radio' name='".$row['Question_Id']."' id='".$row['Question_Id']."-3' value='2' required></td>");
                                    echo ("<td><input type='radio' name='".$row['Question_Id']."' id='".$row['Question_Id']."-4' value='1' required></td>");
                                echo ("</tr>");
                                $num++;
                            }

                        } else if (isset($_POST['history'])){
                            $q = unserialize($data['QuestionList']);
                            $a = unserialize($data['TestAnswer']);

                            $questionArray = array();
                            $question = getQuestions();
                            while ($row = mysqli_fetch_array($question)) {
                                $questionArray[$row['Question_Id']] = $row['Question'];
                            }

                            $num = 1;
                            foreach ($q as $key => $value) {
                                echo ("<tr>");
                                    echo ("<th class='question'><p>".$num.". ".$questionArray[$value]."</p</th>");
                                    $ans = intval(array_shift($a));
                                    for ($i = 4; $i >= 1; $i-- ){
                                        if ($i == $ans) {
                                            echo ("<td><input class='selected' type='radio' name='".$key."' id='' value='' checked></td>");
                                        } else {
                                            echo ("<td><input type='radio' name='".$key."' id='' value='' disabled></td>");
                                        }
                                    }
                                echo ("</tr>");
                                $num++;
                            }
                        } 
                    ?>
                </table>
                <?php 
                    if(isset($_POST['start'])) {
                        echo ("<div class='btn'><input type='submit' name='assesment' value='Submit Assesment'></div>");
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>





