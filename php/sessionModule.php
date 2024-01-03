<?php
    function setSessionData($username, $password) {
        require "mysqli-config.php";
        
        $User_Id = mysqli_query($connect, "SELECT User_Id FROM accounts  where Username like '".$username."' and Password like '".$password."'");
        $User_Id = mysqli_fetch_assoc($User_Id);
        $User_Id = $User_Id['User_Id'];

        if(session_id() == ''){
            session_start();
         }
        $_SESSION["User_Id"] = $User_Id;
    }
?>