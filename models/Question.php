<?php
class Question {
    private $_id;
    private $_type_question;
    private $_qcm;
    private $_question;
    private $_reponse;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    public function setId($id){
        $id = (int) $id;
        if($id > 0)
            $this->_id = $id;
    }

    public function setType_question($type_question){
        if(is_string($type_question))
            $this->_type_question = $type_question;
    }

    public function setQcm($qcm){
        if(is_string($qcm))
            $this->_qcm = $qcm;
    }

    public function setQuestion($question){
        if(is_string($question))
            $this->_question = $question;
    }

    public function setReponse($reponse){
        if(is_string($reponse))
            $this->_question = $reponse;
    }

    public function id(){
        return $this->_id;
    }

    public function type_question(){
        return $this->_type_question;
    }

    public function qcm(){
        return $this->_qcm;
    }

    public function question(){
        return $this->_question;
    }

    public function reponse(){
        return $this->_reponse;
    }
}