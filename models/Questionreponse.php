<?php
/**
 * Classe pour la manipulation des questions et réponses dans la base de données
 */
class Questionreponse extends Model{

    /**
     * Supprime une question et sa réponse de la base de données
     *
     * @param int $A_IdQuestion L'identifiant de la question à supprimer
     * @return bool Retourne vrai si la question et la réponse ont été supprimées avec succès, sinon faux
     */
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

    /**
     * Ajoute une question et sa réponse dans la base de données
     *
     * @param array $A_postParams Les paramètres de la question et de la réponse à ajouter
     * @return string Retourne un message indiquant si la question et la réponse ont été ajoutées avec succès ou s'il y a eu une erreur
     */
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
        return $B_flag ? "La question a été ajoutée avec succès" : "Erreur dans l'ajout de la question";
    }

    /**
     * Met à jour une question et sa réponse dans la base de données
     *
     * @param array $A_postParams Les paramètres de la question et de la réponse à mettre à jour
     * @return string Retourne un message indiquant si la question et la réponse ont été modifiées avec succès ou s'il y a eu une erreur
     */
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