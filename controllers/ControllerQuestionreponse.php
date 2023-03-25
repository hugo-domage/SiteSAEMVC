<?php
require_once ('views/View.php');
class ControllerQuestionreponse{
    private $_QuestionreponseManager;
    private $_view;

    public function __construct($url){
        if (isset($url) && count (array($url))> 1)
            throw new Exception('Page introuvable');
        else
            $this->questionreponse();
    }

    private function questionreponse(){
        $this->_QuestionreponseManager = new QuestionreponseManager;
        $questions = $this->_QuestionreponseManager->getQuestions();

        $this->_view = new View('questionreponse');
        $this->_view->generate(array('questions' => $questions));
    }
}