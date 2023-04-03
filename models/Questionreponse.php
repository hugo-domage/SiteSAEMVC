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

public static function addQuestionreponse(array $A_postParams) :string{
    $P_db = Connection::initConnection();
    $S_sql = "INSERT INTO questionreponse (type_question, qcm, question, reponse, date_maj) VALUES(:difficulty, :qcm, :question, :reponse, :date_maj)";
    $P_sth= $P_db->prepare($S_sql);
    $P_sth->bindValue(':difficulty', $A_postParams['difficulty'],PDO::PARAM_STR);
    $P_sth->bindValue(':qcm', $A_postParams['qcm'],PDO::PARAM_STR);
    $P_sth->bindValue(':question', $A_postParams['question'],PDO::PARAM_STR);
    $P_sth->bindValue(':reponse', $A_postParams['reponse'],PDO::PARAM_STR);
    $P_sth->bindValue(':date_maj', 'now()');
    $B_flag = $P_sth->execute();
    return $B_flag ? "La question à été ajouté avec succès" : "Erreur dans l'ajout de la question";
}


    public static function updateQuestionreponse(array $A_postParams): string {
        $P_db = Connection::initConnection();
        $S_sql = "UPDATE questionreponse SET type_question = :difficulty, qcm = :qcm, question = :question, reponse = :reponse, date_maj = :date_maj WHERE id = :id";
        $P_sth = $P_db->prepare($S_sql);
        $P_sth->bindValue(':difficulty', $A_postParams['difficulty'],PDO::PARAM_STR);
        $P_sth->bindValue(':qcm', $A_postParams['qcm'],PDO::PARAM_STR);
        $P_sth->bindValue(':question', $A_postParams['question'],PDO::PARAM_STR);
        $P_sth->bindValue(':reponse',$A_postParams['reponse'],PDO::PARAM_STR);
        $P_sth->bindValue(':date_maj', 'now()');
        $P_sth->bindValue(':id', $A_postParams['id'],PDO::PARAM_INT);
        $B_flag = $P_sth -> execute();
        return $B_flag ? "La question à été modifiée avec succès" : "Erreur dans l'ajout de la question";
    }
}