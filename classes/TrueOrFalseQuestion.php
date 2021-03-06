<?php
/**
 * Description of question
 *
 * @author memad
 */
class TrueOrFalseQuestion implements Question_interface {

    private $question;
    private $options;
    
    //constructor
    public function __construct($question){
        $this->question = $question;
        $this->options = array("True","False");
    }//end of constructor

    //get question function
    function get_question() {
        return $this->question;
    }//end of get question function

    //get option function
    function get_options() {
        return $this->options;
    }//end of get option function
     
}//end of class
