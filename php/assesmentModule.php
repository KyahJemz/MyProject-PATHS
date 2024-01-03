<?php

    function getQuestions() {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM questionnaire ORDER BY RAND()");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function getResultsByRID ($Result_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM results WHERE Results_Id = '".$Result_Id."'");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function getResultsByUID ($User_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM results WHERE User_Id = '".$User_Id."'");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }

    function setResults ($User_Id, $Test_Id, $top1, $top2, $top3, $Timestamp) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "INSERT INTO results(User_Id, Test_Id, course1, course2, course3, Timestamp) VALUES ('".$User_Id."','".$Test_Id."','".$top1."','".$top2."','".$top3."','".$Timestamp."')");
    }


    function getAssesment ($Test_Id) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM test WHERE Test_Id = '".$Test_Id."'");
        return $sql;
    }

    function setAssesment ($questions, $answers) {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "INSERT INTO test (QuestionList, TestAnswer) VALUES ('".$questions."','".$answers."')");
        return mysqli_insert_id($connect);
    }

    function getCourses () {
        require "mysqli-config.php";
        $sql = mysqli_query($connect, "SELECT * FROM courses");
        if(mysqli_num_rows($sql)){
            return $sql;
        }
    }
    
    function evaluateAssesment($data) {

    //get question id and type, then convert as associative array
    $questionArray = array();
    $question = getQuestions();
    while ($row = mysqli_fetch_array($question)) {
        $questionArray[$row['Question_Id']] = $row['QuestionType'];
    }

    //storage of calculated total points per courses ID
    $calculations = array();

    //storage of questions and answerrs 
    $x = array();
    $y = array();

    // loop assesment questions and data
    foreach ($data as $q => $a) {
        if ($q != "assesment") {

            array_push($x, $q);
            array_push($y, $a);

            // convert questionID to questionTyep
            $questionType = intval($questionArray[$q]) ;
            
            //perform calculations based on 4,3,2,1 answers
            if ($a == 4) {
                $calculations[$questionType] = $calculations[$questionType] - 3;
            } else if ($a == 3) {
                $calculations[$questionType] = $calculations[$questionType] - 2;
            } else if ($a == 2) {
                $calculations[$questionType] = $calculations[$questionType] + 2;
            } else if ($a == 1) {
                $calculations[$questionType] = $calculations[$questionType] + 3;
            } else {

            }
        }
    }

    // Soring Calculations
    arsort($calculations);

    //assign top 1 to 3
    $counter = 1;
    foreach ($calculations as $course => $total) {
        if ($counter == 1) {
            $top1 = $course;
        } else if ($counter == 2) {
            $top2 = $course;
        } else if ($counter == 3) {
            $top3 = $course;
        }
        $counter++;
    }

    //preparing to insert to database
    $Timestamp = date('m')."-".date('d')."-".date('Y');
    $User_Id = $_SESSION['User_Id'];
    $Test_Id = setAssesment(serialize($x), serialize($y));

    //inserting to database
    setResults($User_Id, $Test_Id, $top1, $top2, $top3, $Timestamp);

    return array("course1" => $top1, "course2" => $top2, "course3" => $top3);
    }

    function getCourseData($Course_Id){

        //get course id and name, then convert as associative array
        $coursesArray = array();
        $courses = getCourses();
        while ($row = mysqli_fetch_array($courses)) {
            $coursesArray[$row['Course_Id']] = $row['CourseName'];
        }

        switch ($Course_Id) {
            case "1": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"1.jpg");
                break;
            case "2": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"2.jpg");
                break;
            case "3": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"3.jpg");
                break;
            case "4": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"4.jpg");
                break;
            case "5": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"5.jpg");
                break;
            case "6": 
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"6.jpg");
                break;
            case "7":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"7.jpg");
                break;
            case "8":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"8.jpg");
                break;
            case "9":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"9.jpg");
                break;
            case "10":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"10.jpg");
                break;
            case "11":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"11.jpg");
                break;
            case "12":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"12.jpg");
                break;
            case "13":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"13.jpg");
                break;
            case "14":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"14.jpg");
                break;
            case "15":
                return array("name"=>"$coursesArray[$Course_Id]", "image"=>"15.jpg");
                break;
            default:
                return array("name"=>"No Value", "image"=>"0.jpg");
        }
    }
?>