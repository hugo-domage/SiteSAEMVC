<?php

/**
 * Classe abstraite Model représentant la structure de base des modèles de données
 */
abstract class Model{

    /**
     * Sélectionne une ligne de la table correspondante en utilisant l'ID comme critère
     *
     * @param int $S_id L'identifiant de la ligne à sélectionner
     * @return array|false Retourne un tableau associatif contenant les valeurs de la ligne sélectionnée ou false si la ligne n'a pas été trouvée
     */
    public static function selectById(int $S_id): bool|array
    {
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." WHERE ID = :id ";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth->bindValue(':id',$S_id,PDO::PARAM_INT);
        $P_sth->execute();
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    /**
     * Vérifie si une ligne avec l'ID donné existe dans la table correspondante
     *
     * @param string $S_id L'identifiant de la ligne à vérifier
     * @return bool Retourne true si la ligne existe et false sinon
     */
    public static function checkIfExistsById(String $S_id):bool{
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." WHERE id = ?";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth ->execute(array($S_id));
        return ($P_sth->rowCount() > 0);
    }

    /**
     * Supprime une ligne de la table correspondante en utilisant l'ID comme critère
     *
     * @param int $S_id L'identifiant de la ligne à supprimer
     * @return bool Retourne true si la ligne a été supprimée avec succès et false sinon
     */
    public static function deleteByID(int $S_id) : bool{
        if(!self::checkIfExistsById($S_id)){
            return false;
        }
        $P_db = Connection::initConnection();
        $S_stmt = "DELETE FROM ".get_called_class()." WHERE ID = ? ";
        $P_sth = $P_db->prepare($S_stmt);
        $B_state = $P_sth->execute(array($S_id));
        $P_db = null;
        return $B_state;
    }

    /**
     * Sélectionne une ligne de la table correspondante en utilisant l'adresse email comme critère
     *
     * @param string $S_email L'adresse email de la ligne à sélectionner
     * @return array|false Retourne un tableau associatif contenant les valeurs de la ligne sélectionnée ou false si la ligne n'a pas été trouvée
     */
    public static function selectByEmail(string $S_email): bool|array
    {
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." WHERE email = ? ";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth->execute(array($S_email));
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    /**
    Sélectionne tous les enregistrements de la table correspondant à la classe appelante, triés par ordre décroissant de l'identifiant.
    @return array Tableau des résultats sous forme d'array associatif
     */
    public static function selectAll(): array{
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." ORDER BY id desc";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth->execute();
        $P_db = null;
        return $P_sth->fetchAll();
    }
}