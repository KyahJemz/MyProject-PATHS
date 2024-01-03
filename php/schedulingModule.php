<?php
    if(isset($_POST['btn'])) {
    require "mysqli-config.php";
        session_start();
        requestSchedule($_SESSION['User_Id']);
        $sql = mysqli_query($connect, "INSERT INTO scheduling(User_Id, Schedule, isActive) VALUES ('".$_SESSION['User_Id']."','x','1')");
        header('Location: ../homepage.php');
    } 

    function updateSchedule ($Schedule_Id, $User_Id, $Schedule, $isActive){
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "UPDATE scheduling SET User_Id='".$User_Id."', Schedule='".$Schedule."',isActive='".$isActive."' WHERE Schedule_Id='".$Schedule_Id."'");
    }

    function setSchedule ($Schedule_Id, $Schedule) {
        require "mysqli-config.php";


    }

    function endSchedule ($User_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "UPDATE scheduling SET isActive='0' WHERE User_Id='".$User_Id."'");

    }

    function getSchedule () {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM scheduling");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function requestSchedule($User_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM scheduling WHERE User_ID = '".$User_Id."'");
        if(mysqli_num_rows($sql)){

        }
    }

    function checkIfNotScheduled($User_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM scheduling WHERE User_ID = '".$User_Id."' and isActive = '1'");
        if(mysqli_num_rows($sql)){
            return false;
        } else {
            return true;
        }
    }

    function checkIfOpen($User_Id) {
        require "mysqli-config.php";
        $dateToday = date("m") . "-" . date("d") . "-" . date("Y");
        $sql = mysqli_query($connect, "SELECT * FROM scheduling WHERE User_ID = '".$User_Id."' and isActive = '1' and Schedule = '".$dateToday."'");
        if(mysqli_num_rows($sql)){
            return true;
        } else {
            return false;
        }
    }
    
?>