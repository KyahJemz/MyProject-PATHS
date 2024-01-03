<?php

    function login($username, $password){
        require "mysqli-config.php";
        require "sessionModule.php";
        $usernameCheck = mysqli_query($connect, "SELECT * FROM accounts WHERE Username = '".$username."'");
        $passwordCheck = mysqli_query($connect, "SELECT * FROM accounts WHERE Password = '".$password."'");

        if(mysqli_num_rows($usernameCheck)) {
            if(mysqli_num_rows($passwordCheck)) {

                setSessionData($username,$password);

                header('Location: homepage.php');

            } else {
                header('Location: login.php?error=Incorrect Password!');
            }
        } else {
            header('Location: login.php?error=The username and password is Incorrect!');
        }
    }

    function loginUsingSession($id) {
        require "mysqli-config.php";
        //check if id exist
        $idCheck = mysqli_query($connect, "SELECT * FROM accounts WHERE User_Id = '".$id."'");
        if(mysqli_num_rows($idCheck)) {
            header('Location: homepage.php');
            exit();
        } else {
            header('Location: login.php?error=Invalid Login!');
            exit();
        }
    }

    function verifyLogin($id) {
        require "mysqli-config.php";
        //check if id exist
        $idCheck = mysqli_query($connect, "SELECT * FROM accounts WHERE User_Id = '".$id."'");
        if(mysqli_num_rows($idCheck)) {

        } else {
            header('Location: login.php?error=Invalid Login!');
            exit();
        }
    }

    function getAccounts(){
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM accounts");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function getAccountsById($USer_Id){
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM accounts WHERE User_Id = '".$USer_Id."'");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function updatePassword($User_Id, $Password){
        require "mysqli-config.php";
    mysqli_query($connect, "UPDATE accounts SET Password='" . $Password . "' WHERE User_Id ='" . $User_Id . "'");
    }
?>