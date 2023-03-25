<?php
class QuestionreponseManager extends Model{
    public function getQuestions(){
        $this->getBdd();
        return $this->getAll('t_question_reponse','Question');
    }
}