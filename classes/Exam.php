<?php

/**
 * Description of exam
 *
 * @author memad
 */

class Exam implements Exam_interface {

    private $url;
    private $page;
    private $questions;        // save data as array of objects
    private $answers;          // save data as array of objects
    private $question_number;
    
    //constructor 
    public function __construct() {
            
        $this->page = $_SESSION["currentpage"];
        $this->questions = $this->get_questions();
        $this->answers = $this->get_answers();

    }//end of constructor

    //get numbers of questions(objects) in array
    function getQuestion_number() {
        return count($this->questions);     
    }

    //get current page function 
    function getPage() {
        return $this->page;
    }//end of get current page function
    
    //load exam page function
    public function load_exam_page($page) {
        if (isset($this->questions[$page - 1])) {
            return $this->questions[$page - 1];
        } else {

            throw new Exception("Question dosn't exist");
        }
    }//end of load exam page function
    
    //get question answer function
    public function get_Qustion_answer($current_page) {
        return @$this->answers[$current_page - 2];
    }//end of get question answer

    //get current page index function
    private function get_current_page_index() {
        if(strpos($this->url, "?")) {
            $url_parts = explode("?", $this->url);
            $query_string = $url_parts[1];
            if (!empty($query_string) || !strstr("page", $query_string)) {
            if(strpos($this->url, "=")) {
                $query_string_array = explode("=", $query_string);
                return (int) $query_string_array[1];
            }
        }   
        } else
            return 1;
    }//end of get current page index function

    //get question function
    private function get_questions() {
        $lines = file(exam_file);
        $questions = array();
        foreach ($lines as $line) {

            if (substr($line, 0, 1) === "Q") {

                $new_mcquestion = new MCQuestion($line);
                $questions[] = $new_mcquestion;
            } elseif (substr($line, 0, 1) === "*") {
                $new_tofquestion = new TrueOrFalseQuestion(str_replace("*", "", $line));
                $questions[] = $new_tofquestion;
            } else {
                if(@count($new_mcquestion->get_options()) <= 3) {
                    $new_mcquestion->Add_an_Option($line);
                }
            }
        }
        return $questions;
    }//end of get question function
    
    //get answers function
    private function get_answers() {
        $lines = file(answer_file);
        $answers = array();
        $answers = $lines;
        return $answers;
    }//end of get answers function
    
}//end of class Exam
