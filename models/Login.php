<?php
class Login extends Model{
    public static function isUser(array $A_getParams):?array{
        $S_email = $A_getParams['email'];

        $A_user = self::selectByEmail($S_email);
        $S_password = hash('sha512', $A_getParams['password']);
        if ($A_user && $A_user['password']== $S_password) {
            return array('email' => $S_email, 'usertype' => $A_user['usertype']);
        }
        return null;
    }

    public static function selectByUserEmail(string $S_UserEmail) : array{
        $P_db = Connection::initConnection();
        $S_stmnt = "SELECT * FROM Login WHERE email = :email ";
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->bindValue(':email', $S_UserEmail, PDO::PARAM_INT);
        $P_sth->execute();
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }

    public function create(array $A_values = null):bool {
        $P_db = Connection::initConnection();
        $S_stmnt = "INSERT INTO Login (email,password,usertype) VALUES (:email, :password, :usertype)";
        $P_sth = $P_db->prepare($S_stmnt);
        $P_sth->bindValue(':email', $A_values['email'], PDO::PARAM_STR);
        $P_sth->bindValue(':password', $A_values['password'], PDO::PARAM_STR);
        $P_sth->bindValue(':usertype', 'User', PDO::PARAM_STR);
        $B_state = $P_sth->execute();

        $P_db = null;
        $P_sth->closeCursor();
        return $B_state;
    }

}