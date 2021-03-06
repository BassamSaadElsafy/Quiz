<?php
/**
 * Description of question
 *
 * @author memad
 */
class MCQuestion {
    private $question;
    private $options;
    
    //constructor
    public function __construct($question){
        $this->question = $question;
    }//end of constructor
     
    //get question function
    function get_question() {

        return $this->question;

    }//end of get question

    //get option function
    function get_options() {

        return $this->options;

    }//end of get option function
  
    //add an option function
    function Add_an_Option($option) {
       
        $this->options[] = $option;
        
    }//end of adding an option function

}//end of class
