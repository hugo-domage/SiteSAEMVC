<?php
/**
*
 * Classe Login héritant de la classe Model

Permet de gérer les connexions des utilisateurs et de gérer la table "Login" en base de données
 */
class Login extends Model{

    /**
    *
    * Vérifie si l'utilisateur existe et si le mot de passe fourni correspond
    *
    * @param array $A_getParams Un tableau associatif contenant les paramètres de la requête GET, notamment l'email et le mot de passe
    *
    * @return array|null Retourne un tableau contenant l'email et le type d'utilisateur si l'utilisateur existe et que le mot de passe est correct, sinon retourne null
     */
    public static function isUser(array $A_getParams):?array{
        $S_email = $A_getParams['email'];

        $A_user = self::selectByEmail($S_email);
        $S_password = hash('sha512', $A_getParams['password']);
        if ($A_user && $A_user['password']== $S_password) {
            return array('email' => $S_email, 'usertype' => $A_user['usertype']);
        }
        return null;
    }

    /**
    *
    * Récupère l'utilisateur en base de données correspondant à l'email fourni
    * @param string $S_UserEmail L'email de l'utilisateur recherché
    * @return array Retourne un tableau contenant les informations de l'utilisateur correspondant à l'email fourni
     */
    public static function selectByUserEmail(string $S_UserEmail) : array{
        $P_db = Connection::initConnection();
        $S_stmt = "SELECT * FROM Login WHERE email = :email ";
        $P_sth = $P_db->prepare($S_stmt);
        $P_sth->bindValue(':email', $S_UserEmail, PDO::PARAM_INT);
        $P_sth->execute();
        $A_row = $P_sth->fetch(PDO::FETCH_ASSOC);
        $P_db = null;
        return $A_row;
    }
    /**
    *Crée un nouvel utilisateur en base de données
    *
    * @param array|null $A_values Un tableau associatif contenant les valeurs à insérer en base de données (email et mot de passe)
    *
    * @return bool Retourne true si la création a été effectuée avec succès, sinon retourne false
     */
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