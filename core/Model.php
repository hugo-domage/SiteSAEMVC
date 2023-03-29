<?php

abstract class Model{
    public static function selectById($S_id) {
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." WHERE ID = :id ";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth->bindValue(':id',$S_id,PDO::PARAM_INT);
        $P_sth->execute();
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    public static function checkIfExistsById(String $S_id):bool{
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM ".get_called_class()." WHERE id = ?";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth ->execute(array($S_id));
        return ($P_sth->rowCount() > 0);
    }
    public static function deleteByID($S_id) : bool{
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

    public static function selectByEmail($S_email) {
        $P_db = Connection::initConnection();
        $S_stmnt = "SELECT * FROM ".get_called_class()." WHERE email = ? ";
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->execute(array($S_email));
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    public static function selectAll(): array{
        $P_db = Connection::initConnection();
        $S_stmnt = "SELECT * FROM ".get_called_class()." ORDER BY id desc";
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->execute();
        $P_db = null;
        return $P_sth->fetchAll();
    }


}