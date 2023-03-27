<?php

abstract class Model{
    public static function selectById($S_id) {
        $P_db = Connection::initConnection();
        $S_stmnt = "SELECT * FROM ".get_called_class()." WHERE ID = ? ";
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->execute(array($S_id));
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    public static function deleteByID($S_id) : bool{
        if(!self::checkIfExistsById($S_id)){
            return false;
        }
        $P_db = Connection::initConnection();
        $S_stmnt = "DELETE FROM ".get_called_class()." WHERE ID = ? ";
        $P_sth = $P_db->prepare($S_stmnt);
        $B_state = $P_sth->execute(array($S_id));
        $P_db = null;
        return $B_state;
    }

    public static function updateById(Array $A_postParams,$S_id ) : bool{
        $P_db = Connection::initConnection();

        $S_keys = "";
        foreach (array_keys($A_postParams) as &$S_key){
            $S_keys.= $S_key."= ? ,";
        }
        $S_keys[-1] = " ";

        $S_stmnt = "UPDATE ".get_called_class()." SET ".$S_keys." WHERE ID = ?";
        $P_sth = $P_db->prepare($S_stmnt);
        array_push($A_postParams,$S_id);
        $B_state = $P_sth->execute(array_values($A_postParams));
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
        $S_stmnt = "SELECT * FROM ".get_called_class();
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->execute();
        $P_db = null;
        return $P_sth->fetchAll();
    }


}