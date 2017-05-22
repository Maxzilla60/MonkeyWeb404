<?php

class Model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllWerknemers(){
        $sql = "SELECT id, naam, uren, evenementen FROM werknemers";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllEvenementen(){
        $sql = "SELECT id, naam, datum, werknemers, beschrijving FROM evenementen";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



    public function getAllUsers() {
        $sql = "SELECT id, username, password FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addWerknemer($id, $naam, $uren, $evenementen)
    {
        $sql = "INSERT INTO werknemers (id, naam, uren, evenementen) VALUES (:id, :naam, :uren, :evenementen)";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':naam' => $naam, ':uren' => $uren, ':evenementen' => $evenementen);

        $query->execute($parameters);
    }

    public function addEvenement ($id, $naam, $datum,$werknemers, $beschrijving)
    {
        $sql = "INSERT INTO evenementen (id, naam, datum, werknemers, beschrijving) VALUES (:id, :naam, :datum, :werknemers, :beschrijving)";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':naam' => $naam, ':datum' => $datum, ':werknemers' => $werknemers, ':beschrijving' => $beschrijving);

        $query->execute($parameters);
    }


    public function deleteWerknemer($werknemer_id)
    {
        $sql = "DELETE FROM werknemers WHERE id = :werknemer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':werknemer_id' => $werknemer_id);

        $query->execute($parameters);
    }

    public function deleteEvenement($evenement_id)
    {
        $sql = "DELETE FROM evenementen WHERE id = :evenement_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':evenement_id' => $evenement_id);

        $query->execute($parameters);
    }

    public function getWerknemer($werknemer_id)
    {
        $sql = "SELECT id, naam, uren, evenementen FROM werknemers WHERE id = :werknemer_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':werknemer_id' => $werknemer_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function getEvenement($evenement_id)
    {
        $sql = "SELECT id, naam, datum, werknemers, beschrijving FROM evenementen WHERE id = :evenement_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':evenement_id' => $evenement_id);

        $query->execute($parameters);

        return $query->fetch();
    }


    public function updateWerknemer($naam, $uren, $evenementen, $werknemer_id)
    {
        $sql = "UPDATE werknemers SET naam = :naam, uren = :uren, evenementen = :evenementen WHERE id = :werknemer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':naam' => $naam, ':uren' => $uren, ':evenementen' => $evenementen, ':werknemer_id' => $werknemer_id);

        $query->execute($parameters);
    }

    public function updateEvenement($naam, $datum, $werknemers, $beschrijving, $evenement_id)
    {
        $sql = "UPDATE evenementen SET naam = :naam, datum = :datum, werknemers = :werknemers, beschrijving = :beschrijving WHERE id = :evenement_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':naam' => $naam, ':datum' => $datum, ':werknemers' => $werknemers, ':beschrijving' => $beschrijving, ':evenement_id' => $evenement_id);

        $query->execute($parameters);
    }
}
