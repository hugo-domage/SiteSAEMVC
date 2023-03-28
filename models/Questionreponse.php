<?php
class Questionreponse extends Model{
public static function deleteQusetionReponse(int $A_IdQuestion): bool
{
    $P_db = Connection::initConnection();
    try{
        $S_sql = "Delete from questionreponse where $A_IdQuestion = :id";
        $P_sth = $P_db->prepare($S_sql);
        $P_sth->bindValue(':id', $A_IdQuestion, PDO::PARAM_INT);
        $P_sth->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
}
/*
    public static function UpdateQusetionReponse(array $A_postParams): bool {
        $A_IdQuestion = intval($A_postParams['id']);

        $A_paramRecipe = array('id' => $A_postParams['id'], 'type_question' => $A_postParams['type_question'], 'qcm' => $A_postParams['qcm'],
            'question' => $A_postParams['question'], 'reponse' => $A_postParams['reponse'], 'emailadm'=> $A_postParams['emailadm'],
            'date_maj'=>$A_postParams['date_maj']);

        $B_flag = self::updateById($A_paramRecipe,$A_IdQuestion);

    else{
return false;
}
return $B_flag;
}
*/
}