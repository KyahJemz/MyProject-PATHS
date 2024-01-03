<?php
    require "php/mysqli-config.php";
    require "php/schedulingModule.php";
    require "php/loginModule.php";

    //print_r($_POST);

    if(isset($_POST['register'])) {
        $sql = mysqli_query($connect, "INSERT INTO accounts(First_Name, Last_Name, Gender, Age, Email, Contact, Username, Password) VALUES ('".$_POST['First_Name']."' ,'".$_POST['Last_Name']."' ,'".$_POST['Gender']."' , '".$_POST['Age']."' , '".$_POST['Email']."' , '".$_POST['Contact']."' , '".$_POST['Username']."' , '".$_POST['Password']."')");
    } else if (isset($_POST['accountList'])) {
        $sql = mysqli_query($connect, "UPDATE accounts SET First_Name='".$_POST['First_Name']."', Last_Name='".$_POST['Last_Name']."', Gender='".$_POST['Gender']."', Age='".$_POST['Age']."', Email='".$_POST['Email']."', Contact='".$_POST['Contact']."', Username='".$_POST['Username']."', Password='".$_POST['Password']."' WHERE User_Id ='".$_POST['User_Id']."'");
    } else if (isset($_POST['accountListDelete'])) {
        $sql = mysqli_query($connect, "DELETE FROM accounts WHERE User_Id = '" . $_POST['User_Id'] . "'");
    } else if (isset($_POST['scheduleList'])) {
        updateSchedule($_POST['Schedule_Id'], $_POST['User_Id'], $_POST['Schedule'], $_POST['isActive']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.A.T.H.S. - Administrator</title>
    <style>
        body {
            background-color: rgb(240, 240, 240);
        }
        h3 {
            text-align: center;
        }
        h2 {
            text-align: left;
        }
        .registration {
            margin-bottom: 50px;
            text-align: right;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.192);
            border: 2px solid black;
            border-radius: 10px;
            width: fit-content;
        }
        .accountList {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.192);
            border: 2px solid black;
            border-radius: 10px;
            width: fit-content; 
            margin-bottom: 50px;
        }
        .scheduleList {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.192);
            border: 2px solid black;
            border-radius: 10px;
            width: fit-content; 
            margin-bottom: 50px;
        }
 
        @media screen and (max-width: 700px) {
          
        }

    </style>
</head>
<body>
    <div class="ACCOUNTS">
        <div class="registration">
            <form action="adminpanel.php" method="POST">
                <h3>Students Registration</h3> 
                <table>
                    <tr>
                        <td><label for="firstname">First name :</label></td>
                        <td><input type="text" id="firstname" name="First_Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="lastname">Last name :</label></td>
                        <td><input type="text" id="lastname" name="Last_Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender :</label></td>
                        <td><input type="text" id="gender" name="Gender" required></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age :</label></td>
                        <td><input type="text" id="age" name="Age" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email :</label></td>
                        <td><input type="text" id="email" name="Email" required></td>
                    </tr>
                    <tr>
                        <td><label for="contact">Contact :</label></td>
                        <td><input type="text" id="contact" name="Contact" required></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username :</label></td>
                        <td><input type="text" id="username" name="Username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password :</label></td>
                        <td><input type="text" id="password" name="Password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Register Student" name="register"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="accountList">
            <h2>Students Account List and Information</h2>
            <table>
                <tr>
                    <td>User_Id</td>
                    <td>First_Name</td>
                    <td>Last_Name</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Email</td>
                    <td>Contact</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Save Edits</td>
                    <td>Delete Row</td>
                </tr>

                <?php
                    $accountsData = getAccounts();
                    while ($row = mysqli_fetch_array($accountsData)) {
                        echo ("<form action='' method='POST'><tr>");
                            echo ("<td><input type='text' value='" . $row['User_Id'] . "' name='User_Id' readonly required></td>");
                            echo ("<td><input type='text' value='" . $row['First_Name'] . "' name='First_Name' required></td>");
                            echo ("<td><input type='text' value='" . $row['Last_Name'] . "' name='Last_Name' required></td>");
                            echo ("<td><input type='text' value='" . $row['Gender'] . "' name='Gender' required></td>");
                            echo ("<td><input type='text' value='" . $row['Age'] . "' name='Age' required></td>");
                            echo ("<td><input type='text' value='" . $row['Email'] . "' name='Email' required></td>");
                            echo ("<td><input type='texr' value='" . $row['Contact'] . "' name='Contact' required></td>");
                            echo ("<td><input type='text' value='" . $row['Username'] . "' name='Username' required></td>");
                            echo ("<td><input type='text' value='" . $row['Password'] . "' name='Password' required></td>");
                            echo ("<td><input type='submit' name='accountList' value='Save Changes'></td>");
                            echo ("<td><input type='submit' name='accountListDelete' value='Delete Data'></td>");
                        echo ("</tr></form>");
                    }
                ?>
            </table>
        </div>
    </div>
    <div class="SCHEDULING">
        <div class="scheduleList">
            <h2>Students Scheduling List</h2>
            <table>
                <tr>
                    <td>Schedule_Id</td>
                    <td>User_Id</td>
                    <td>Schedule</td>
                    <td>isActive</td>
                </tr>
                <?php
                    $schedData = getSchedule();
                    while($row = mysqli_fetch_array($schedData)) {
                        echo ("<form action='' method='POST'><tr>");
                            echo ("<td><input type='text' value='".$row['Schedule_Id']."' name='Schedule_Id' readonly required></td>");
                            echo ("<td><input type='text' value='".$row['User_Id']."' name='User_Id' required></td>");
                            echo ("<td><input type='text' value='".$row['Schedule']."' name='Schedule' required></td>");
                            echo ("<td><input type='text' value='".$row['isActive']."' name='isActive' required></td>");
                            echo ("<td><input type='submit' name='scheduleList' value='Save Changes'></td>");
                        echo ("</tr></form>");
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>



