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

    public function getAllStudents() {
        $sql = "SELECT id, name, number, richting FROM students";
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

    public function getUsername(){
        $sql = "SELECT username FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
  
    public function addStudent($name, $number, $richting)
    {
        $sql = "INSERT INTO students (name, number, richting) VALUES (:name, :number, :richting)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':number' => $number, ':richting' => $richting);

        $query->execute($parameters);
    }

    public function deleteStudent($student_id)
    {
        $sql = "DELETE FROM students WHERE id = :student_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id);

        $query->execute($parameters);
    }


    public function getStudent($student_id)
    {
        $sql = "SELECT id, name, number, richting FROM students WHERE id = :student_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateStudent($name, $number, $richting, $student_id)
    {
        $sql = "UPDATE students SET name = :name, number = :number, richting = :richting WHERE id = :student_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':number' => $number, ':richting' => $richting, ':student_id' => $student_id);

        $query->execute($parameters);
    }
}
