<?php

/**
 * Classe de connexion à la base de données.
 */
final class Connection
{
    /**
     * Connecte à la base de données en utilisant les paramètres fournis.
     *
     * @param string $host Le nom d'hôte de la base de données.
     * @param string $user Le nom d'utilisateur de la base de données.
     * @param string $password Le mot de passe de la base de données.
     *
     * @return PDO L'objet PDO représentant la connexion à la base de données.
     */
    public static function connect(string $host, string $user, string $password): PDO
    {
        try {
            $bdd = new PDO("pgsql:host=$host; port=5432; dbname=$user; user=$user password=$password");
            return $bdd;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Initialise une connexion à la base de données en utilisant les paramètres de connexion prédéfinis.
     *
     * @return PDO L'objet PDO représentant la connexion à la base de données.
     */
    public static function initConnection(): PDO
    {
        return Connection::connect("trumpet.db.elephantsql.com", "itkrikdc", "4KdTrccy3LgH8IGDpq9P2qeZAdJo4l-n");
    }
}
