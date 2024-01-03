<?php 
    require "php/loginModule.php";
    require "php/assesmentModule.php";
    
    session_start();

    if (!empty($_SESSION['User_Id'])) {
        verifyLogin($_SESSION['User_Id']);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - History</title>
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
            height: 200vh;
            padding: 5vh 0px 5vh 0px;
            overflow-x: hidden;
        }
        .boxContainer {
            width: 50vw;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.712);
            border: .5vw solid white;
            padding: .3vw;
            border-radius: 1vw;
            display: flex;
            flex-direction: column;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .headerImage {
            width: 100%;
        }
        table {
            width: 100%;
        }
        table tr td{
            padding: 1vw;
        }
        table tr td input {
            text-align: right;
            padding: .5vw 1vw .5vw 1vw;
            border-radius: 5px;
            background-color: rgba(0, 0, 255, 0.500); 
        }
        .quote {
            text-align: center;
            width: 100%;
            font-size: 1.5vw;
        }
        .title {
            text-align: center;
            font-weight: bolder;
            font-size: 2vw;
        }
        .text {
            width: 100%;
            font-size: 1.5vw;
        }
        .back {
            position: absolute;
            top: 2vh;
            left: 2vw;
            font-size: 1.5vw;
            font-weight: bolder;
        }
        .back a {
            color: black;
            text-decoration: none;
        }

        @media screen and (max-width: 700px) {
           body {
            height: fit-content;
            overflow: hidden;
            padding: 10px;
            margin: 0;
            overflow-y: auto;
           }
           .boxContainer{
            margin-top: 30px;
                width: 100%;
           }
            .container {
                overflow-x: scroll;
                margin: 0;
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
            <table>
                <tr>
                    <td class="quote" colspan="2"><hr><br>“Education is the passport to the future, for tomorrow belongs <br>to those who prepare for it today.” <br>– Malcolm X<br><br><hr></td> 
                </tr>
                <tr>
                    <td class="title" colspan="2">Assesment History</td>
                </tr>
                <?php
                    $historyData = getResultsByUID($_SESSION['User_Id']);
                    if ($historyData){
                        $counter = 1;
                            while ($row = mysqli_fetch_array($historyData)) {
                                echo ("<form action='result.php' method='POST'><tr>");
                                echo ("<td class='text'>Student Assesment " . $counter . " <br>" . $row['Timestamp'] . "</td>");
                                echo ("<td><input type='text' name='value' value='" . $row['Results_Id'] . "' hidden><input type='text' name='test' value='" . $row['Test_Id'] . "' hidden><input type='submit' name='review' value='Review Result'></td>");
                                echo ("</tr></form>");
                                $counter++;
                            }
                        } else {
                            echo ("<tr><td class='text' colspan='2'>No Assesment History</td></tr>");
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>





