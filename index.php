<?php
require_once "autoload.php";

if (!isset($_POST["prev"]) && !isset($_POST["next"])){
    $_SESSION["currentpage"] = 1;

    $_SESSION['true_answers'] = array();
}   

if(isset($_POST["next"])) {

    $_SESSION["currentpage"]++;

}

if(isset($_POST["prev"])) {

    $_SESSION["currentpage"]--;
    
} 

    $answer = isset($_POST["selected_item"]) ? $_POST["selected_item"] : "";

    try {
        
        $exam = new Exam();
        
        $current_page = $exam->getPage();
        
        if($current_page >= 2) {
            
            //check if std answer matching the right answer
            if (trim($exam->get_Qustion_answer($current_page)) == trim($answer))
            {
                //if student selected the right answer then add it to true answers array session (add point to student)
                $_SESSION['true_answers'][trim($exam->get_Qustion_answer($current_page))] = trim($answer);
            
            //check if his answer is wrong and he selected the right one to the same question before then remove it from true answers array session
            }else if( array_key_exists(trim($exam->get_Qustion_answer($current_page)) , $_SESSION['answers']) ){

                //remove one point from his result
                unset($_SESSION['true_answers'][trim($exam->get_Qustion_answer($current_page))]);

            }

        }
        
        
        if ($current_page == ($exam->getQuestion_number()+1)) {
            include_once("views/End.php");
            exit();
        } else {
                $current_question = $exam->load_exam_page($current_page);
               
        }
        
    } catch (Exception $ex) {
        if (mode === "production") {
            include("views/error.php");
            exit();
        } else {
            echo $ex->getMessage();
            echo $ex->getTraceAsString();
            exit();
        }
    }

?>

<html>
    <?php include "views/header.php"; ?>
    <body>
        <?php include "views/questions.php"; ?>
    </body>
</html>